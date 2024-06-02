<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../inc/adminSQL.php');
require('../inc/essentials.php');
adminLogin();

header('Content-Type: application/json');

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'get-general') {
        $q = "SELECT * FROM `settings` WHERE `id_no`=?";
        $values = [1];
        $res = select($q, $values, "i");
        if($res) {
            $data = mysqli_fetch_assoc($res);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Failed to fetch data']);
        }
    } elseif ($_POST['action'] == 'upd_shutdown') {
        $form_data = ($_POST['shutdown'] == 0) ? 1 : 0;
        $q = "UPDATE `settings` SET `shutdown`=? WHERE `id_no`=?";
        $values = [$form_data, 1];
        $res = update($q, $values, 'ii');
        echo json_encode(['result' => $res]);
        
    } elseif ($_POST['action'] == 'upd_general') {
        $site_title = $_POST['site_title'];
        $site_about = $_POST['site_about'];
        $q = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `id_no`=?";
        $values = [$site_title, $site_about, 1];
        $res = update($q, $values, 'ssi');
        echo json_encode(['result' => $res]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>