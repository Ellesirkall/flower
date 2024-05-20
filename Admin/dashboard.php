<?php 
require('inc/essentials.php');
adminLogin();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <?php require('inc/links.php');?>
</head>
<body>

<div class="container-fluid shadow text-light p-3 d-flex align-items-center justify-content-between" style="background-color:#fce7e9;">
    <h5 class="mb-0 fw dark-pink lobster-regular">Admin Panel</h5>
    <a href="logout.php" class="btn custom-bg btn-sm text-white">Log Out</a>
</div>


<?php require('inc/scripts.php');?>  
</body>
</html>