<?php

define('SITE_URL', 'http://127.0.0.1/flower/');
define('ROOMS_IMG_PATH', SITE_URL . 'Images/rooms/');
define('USERS_IMG_PATH', SITE_URL . 'Images/users/');
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/flower/Images/');
define('ROOMS_FOLDER', 'rooms/');
define('USERS_FOLDER', 'users/');

function adminLogin() {
    session_start();
    if (!(isset($_SESSION["adminLogin"]) && $_SESSION["adminLogin"] == true)) {
        echo "<script>
            window.location.href='index.php'
        </script>";
        exit();
    }
}

function redirect($url) {
    echo "<script>
        window.location.href='$url'
    </script>";
    exit();
}

function alert($type, $msg) {
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show" style="position: fixed; top: 80px; right: 25px;" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}

function uploadImage($image, $folder) {
    $target_dir = UPLOAD_IMAGE_PATH . $folder . "/";
    $target_file = $target_dir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        return 'inv_img';
    }

    // Check file size (2MB maximum)
    if ($image["size"] > 2000000) {
        return 'inv_size';
    }

    // Allow certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "webp");
    if (!in_array($imageFileType, $allowedFormats)) {
        return 'inv_img';
    }
    
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        return basename($image["name"]);
    } else {
        error_log("Failed to move uploaded file: " . $image["tmp_name"] . " to " . $target_file); // Debug log
        return 'upd_failed';
    }
}

function deleteImage($image, $folder) {
    $imgPath = UPLOAD_IMAGE_PATH . $folder . $image;
    if (file_exists($imgPath)) {
        return unlink($imgPath);
    }
    return false;
}

function uploadUserImage($image){
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp']; 
    $img_mime = $image['type'];

    if(!in_array($img_mime, $valid_mime)) { 
        return 'inv_img'; // Invalid image mime or format
    } else { 
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION); 
        $rname = 'IMG_'.random_int(11111, 99999).".jpeg";

        $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;

        if ($ext == 'png' || $ext == 'PNG') {
            $img = imagecreatefrompng($image['tmp_name']);
        } elseif ($ext == 'webp' || $ext == 'WEBP') {
            $img = imagecreatefromwebp($image['tmp_name']);
        } else {
            $img = imagecreatefromjpeg($image['tmp_name']);
        }

        if(imagejpeg($img, $img_path, 75)) { 
            return $rname;
        } else { 
            return 'upd_failed';
        }
    }
}

?>