<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../Admin/inc/essentials.php');
require('../Admin/inc/adminSQL.php');

//Match password with confirm password

if (isset($_POST['register'])) {

    $data = sanitization($_POST);

    if ($data['pw'] != $data['cpw']) {
        echo 'pass_mismatch';
        exit;
    }

    // Check if user exists
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `pn` = ? LIMIT 1", 
        [$data['email'], $data['pn']], "ss");

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_exist' : 'phone_exist';
        exit;
    }

    // Upload user image
    $img = uploadUserImage($_FILES['profile']);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } elseif ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }

    $enc_pass = password_hash($data['pw'], PASSWORD_BCRYPT);

    $q = "INSERT INTO `user_cred`(`name`, `email`, `address`, `pn`, `posc`, `bd`, `profile`, `pw`) VALUES (?,?,?,?,?,?,?,?)";

    $values = [$data['name'], $data['email'], $data['address'], $data['pn'], $data['posc'], $data['bd'], $img, $enc_pass];

    if (insert($q, $values, 'ssssssss')) {
        echo 1;
    } else {
        echo 'insert_fail';
    }
}

if (isset($_POST['login'])) {
    $data = sanitization($_POST);

     // Check if user exists
     $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? LIMIT 1", 
     [$data['email']], "s");

    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email';
    }
    else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_fetch['status']==0) {
            echo 'inactive';
        } else {
            if(!password_verify($data['pass'], $u_fetch['pw'])){
                echo 'invalid_pass';
            } else {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['uId'] = $u_fetch['id'];
                $_SESSION['uName'] = $u_fetch['name'];
                $_SESSION['uPic'] = $u_fetch['profile'];
                $_SESSION['uPhone'] = $u_fetch['pn'];
                echo 1;

            }
        }
    }
    
}

?>
