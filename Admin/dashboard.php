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

    <?php require('inc/header.php');?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="m-2 lobster-regular color-pink">Dashboard</h3>
                <!-- <h6 class="badge bg-danger py-2 px-3 rounded">Shutdown mode is Active</h6> -->
            </div>

            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <a href="new_bookings.php" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <h6>New Bookings</h6>
                            <h1 class="mb-2 mb-0">0</h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="refund_bookings.php" class="text-decoration-none">
                        <div class="card text-center text-danger p-3">
                            <h6>Refund Bookings</h6>
                            <h1 class="mb-2 mb-0">0</h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="user_queries.php" class="text-decoration-none">
                        <div class="card text-center text-info p-3">
                            <h6>User Queries</h6>
                            <h1 class="mb-2 mb-0">0</h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="ratings.php" class="text-decoration-none">
                        <div class="card text-center text-warning p-3">
                            <h6>Rating & Reviews</h6>
                            <h1 class="mb-2 mb-0">0</h1>
                        </div>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="m-2 lobster-regular color-pink">Booking Analytics</h3>
                <select class="form-select shadow-none bg-white w-auto">
                    <option selected>Past 30 Days</option>
                    <option value="1">Past 90 Days</option>
                    <option value="2">Past 1 Year</option>
                    <option value="3">All time</option>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-primary p-3">
                        <h6>New Bookings</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-success p-3">
                        <h6>Active Bookings</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-danger p-3">
                        <h6>Cancelled Bookings</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="m-2 lobster-regular color-pink">User, Queries, Reviews Analytics</h3>
                <select class="form-select shadow-none bg-white w-auto">
                    <option selected>Past 30 Days</option>
                    <option value="1">Past 90 Days</option>
                    <option value="2">Past 1 Year</option>
                    <option value="3">All time</option>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-primary p-3">
                        <h6>New Registration</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-success p-3">
                        <h6>Queries</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-warning p-3">
                        <h6>Reviews</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                </div>

            <h3 class="m-2 lobster-regular color-pink">Users</h3>
            <div class="row mb-3">
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-success p-3">
                        <h6>Active</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-warning p-3">
                        <h6>Inactive</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center text-danger p-3">
                        <h6>Unverified</h6>
                        <h1 class="mb-2 mb-0">0</h1>
                        <h4 class="mb-2 mb-0">₱0</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php require('inc/scripts.php');?>  
</body>
</html>