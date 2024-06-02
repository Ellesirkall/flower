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
    <title>Admin - Settings</title>
    <?php require('inc/links.php');?>
</head>
<body>

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="m-2 lobster-regular color-pink">Settings</h4>

                <!-- Setting section -->

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 color-pink">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square color-white"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p> 
                        
                    </div>
                </div>

                <!-- Setting Modal -->

                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title color-pink">General Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">About Us</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-dark text-white shadow-none" onclick="upd_general(this.checked)">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Setting Shutdown -->

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                        <h5 class="card-title m-0 color-pink">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.checked)" type="checkbox" class="form-check-input" id="shutdown-toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            Shutdown the website. Customers will no longer be entertained.
                        </p>
                    </div>
                </div>


            </div>

                
        </div>
    </div>

                
        <?php require('inc/scripts.php');?>  
        
</body>
</html>