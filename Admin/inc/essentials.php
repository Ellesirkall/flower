<?php

define('SITE_URL', 'http://127.0.0.1/flower/');
define('ROOMS_IMG_PATH', SITE_URL . 'Images/rooms/');
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/flower/Images/');
define('ROOMS_FOLDER', 'rooms/');

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

function uploadImage($file, $folder) {
    $target_dir = UPLOAD_IMAGE_PATH . $folder . "/";
    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return 'inv_img';
    }

    // Check file size (2MB maximum)
    if ($file["size"] > 2000000) {
        return 'inv_size';
    }

    // Allow certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "webp");
    if (!in_array($imageFileType, $allowedFormats)) {
        return 'inv_img';
    }
    
    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return basename($file["name"]);
    } else {
        error_log("Failed to move uploaded file: " . $file["tmp_name"] . " to " . $target_file); // Debug log
        return 'upd_failed';
    }
}

function deleteImage($imageName, $folder) {
    $imgPath = UPLOAD_IMAGE_PATH . $folder . $imageName;
    if (file_exists($imgPath)) {
        return unlink($imgPath);
    }
    return false;
}

?>