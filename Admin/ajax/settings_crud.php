<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../inc/adminSQL.php');
require('../inc/essentials.php');
adminLogin();

header('Content-Type: application/json');

if (isset($_POST['action'])) {

    if ($_POST['action'] == 'get-general') {
        $row = "SELECT * FROM `settings` WHERE `id_no`=?";
        $values = [1];
        $res = select($row, $values, "i");
        if($res) {
            $data = mysqli_fetch_assoc($res);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Failed to fetch data']);
        }   

    } elseif ($_POST['action'] == 'upd_general') {
        $site_title = $_POST['site_title'];
        $site_about = $_POST['site_about'];
        $row = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `id_no`=?";
        $values = [$site_title, $site_about, 1]; 
        $res = update($row, $values, 'ssi');
        echo json_encode(['result' => $res ? 1 : 0]);

    } elseif ($_POST['action'] == 'get_contacts') {
        $row = "SELECT * FROM `contacts` WHERE `id_no`=?";
        $values = [1];
        $res = select($row, $values, "i");
        if($res) {
            $data = mysqli_fetch_assoc($res);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Failed to update data']);
        }

    }  elseif ($_POST['action'] == 'upd_contacts') {
            $address = $_POST['address'];
            $gmap = $_POST['gmap'];
            $pn1 = $_POST['pn1'];
            $pn2 = $_POST['pn2'];
            $email = $_POST['email'];
            $fb = $_POST['fb'];
            $ig = $_POST['ig'];
            $tw = $_POST['tw'];
            $iframe = $_POST['iframe'];
            $row = "UPDATE `contacts` SET `address`=?, `gmap`=?, `pn1`=?, `pn2`=?, `email`=?, `fb`=?, `ig`=?, `tw`=?, `iframe`=? WHERE `id_no`=?";
            $values = [$address, $gmap, $pn1, $pn2, $email, $fb, $ig, $tw, $iframe, 1]; 
            $res = update($row, $values, 'ssiisssssi');
            echo json_encode(['result' => $res ? 1 : 0]);
    } else {
        echo json_encode(['error' => 'Failed to update data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>