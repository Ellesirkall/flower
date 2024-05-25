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
    <title>Admin - Users</title>
    <?php require('inc/links.php');?>
</head>
<body>

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="m-2 lobster-regular color-pink">Users</h4>

                <!-- User section -->

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 color-pink">User 1</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                             Ban
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Details</h6>
                        <p class="card-text" id="#">ID: 01</p>
                        <p class="card-text" id="#">Name: Jon Doe</p>
                        <p class="card-text" id="#">E-mail: jdoe@gmail.com</p>                  
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 color-pink">User 2</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            Ban
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Details</h6>
                        <p class="card-text" id="#">ID: 02</p>
                        <p class="card-text" id="#">Name: Mary Doe</p>
                        <p class="card-text" id="#">E-mail: mdoe@gmail.com</p> 
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 color-pink">User 3</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                             Ban
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Details</h6>
                        <p class="card-text" id="#">ID: 03</p>
                        <p class="card-text" id="#">Name: Maloi Lou</p>
                        <p class="card-text" id="#">E-mail: mlou@gmail.com</p> 
                    </div>
                </div>




            </div>
        </div>
    </div>

                
        <?php require('inc/scripts.php');?>  
</body>
</html>