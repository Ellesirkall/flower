<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowerpath Hotel - Rooms</title>
    <?php require('inc/links.php'); ?>
    <style>
        .box{
            border-top-color: var(--pink) !important;
        }
    </style>
</head>
<body>


<!-- Header -->

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h1 class="fw-bold lobster-regular text-center color-pink">Our Rooms</h1>
    <hr>
</div>

<div class="container">
    <div class="row">

        <!-- Filter -->

        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch lp-bg">
                    <h4 class="mt-2 lobster-regular color-pink">Filters</h4>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2  lp-bg" id="filterDropdown">
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                            <label for="form-label">Arrival Date</label>
                            <input type="date" class="form-control shadow-none mb-3">
                            <label for="form-label">Departure Date</label>
                            <input type="date" class="form-control shadow-none mb-3">
                        </div>
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none mb-3">
                                <label for="form-check-label" for="f1">Facility 1</label>   
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none mb-3">
                                <label for="form-check-label" for="f2">Facility 2</label>   
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none mb-3">
                                <label for="form-check-label" for="f3">Facility 3</label>   
                            </div>
                        </div>
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">Guests</h5>
                            <div class="d-flex">
                                <div class="me-3">
                                    <label for="form-label">Adults</label>  
                                    <input type="number" class="form-control shadow-none"> 
                                </div>
                                <div>
                                    <label for="form-label">Children</label>  
                                    <input type="number" class="form-control shadow-none"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Rooms -->

        <div class="col-lg-9 col-md-12 px-4">

            <?php 
                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?", [1,0],'ii');

                while ($room_data = mysqli_fetch_assoc($room_res)) {

                    //get features
                    $feat_q = mysqli_query($con, "SELECT f.name FROM `feature` f 
                        INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                        WHERE rfea.room_id = '$room_data[id]'");
                    
                    $feat_data ="";
                    while($feat_row = mysqli_fetch_assoc($feat_q)){
                        $feat_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $feat_row[name]
                        </span>";
                    }

                    //get facilities
                    $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
                        INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                        WHERE rfac.room_id = '$room_data[id]'");
                    
                    $fac_data ="";
                    while($fac_row = mysqli_fetch_assoc($fac_q)){
                        $fac_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $fac_row[name]
                        </span>";
                    }

                     //get room image
                     $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                     $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
                        WHERE `room_id` = '$room_data[id]' 
                        AND `thumb`='1'");

                    if(mysqli_num_rows($thumb_q)>0){
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                    }

                    echo <<<data
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-4 mb-lg-0 mb-md-0 mb-3 align-items-center">
                                    <img src="$room_thumb" width="900px" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-4 px-lg-4 px-md-3 px-0">
                                    <h5 class="mb-3">$room_data[name]</h5>
                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        $feat_data
                                       
                                    </div>
                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                        $fac_data
                                    </div>
                                    <div class="guests mb-4">
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[adult] Adult/s
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[children] Child/ren
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h6 class="mb-4 fw"><span>₱$room_data[price]</span> per night</h6>
                                    <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">Details</a>
                                </div>
                            </div>
                        </div>
                    data;
                    
                }
            ?>

            
            
        </div>
        
    </div>
</div>


<!-- Footer -->

<?php require('inc/footer.php'); ?>

</body>
</html>

