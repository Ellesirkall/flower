<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowerpath Hotel - Details</title>
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
<?php 

    if(!isset($_GET['id'])){
        redirect('rooms.php');
    }

    $data = sanitization($_GET);
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0],'iii');

    if(mysqli_num_rows($room_res)==0){
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);
?>



<div class="container d-flex justify-content-center align-items-center">
    <div class="row">

        <div class="col-12 my-5 mb-4 px-4">
            <h2 class="fw-bold lobster-regular color-pink"><?php echo $room_data['name']?></h2>
            <div style="font-size: 16px;">
                <a href="index.php" class="text-secondary text-decoration-none">Home</a>
                <span class="text-secondary"> > </span>
                <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 px-4">
            <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <?php 
                        $room_img = ROOMS_IMG_PATH."thumbnail.jpg";
                        $img_q = mysqli_query($con, "SELECT * FROM `room_images` 
                            WHERE `room_id` = '$room_data[id]'");

                        if(mysqli_num_rows($img_q)>0){

                            $active_class ='active';
                            
                            while($img_res = mysqli_fetch_assoc($img_q)){
                               echo"<div class='carousel-item $active_class'>
                                <img src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block w-100 rounded'>
                            </div>
                            ";
                            $active_class =''; 
                            }

                            $room_img = ROOMS_IMG_PATH.$img_res['image'];
                        } else {
                            echo "<div class='carousel-item active'>
                                <img src='$room_img' class='d-block w-100'>
                            </div>";
                        }
                    ?>
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div> 

        <div class="col-lg-5 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <?php 
                        echo<<<price
                            <h4 class='mb-4 fw'><span>₱$room_data[price]</span> per night</h4>
                        price;

                        echo<<<rating
                            <div class="mb-3 rating">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                        rating;

                    // get features
                    $feat_q = mysqli_query($con, "SELECT f.name FROM `feature` f 
                        INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                        WHERE rfea.room_id = '$room_data[id]'");
                    
                    $feat_data ="";
                    while($feat_row = mysqli_fetch_assoc($feat_q)){
                        $feat_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $feat_row[name]
                        </span>";
                    }
                    
                    echo<<<features
                        <div class="mb-3">
                            <h6 class="mb-1 fw-bold dark-pink">Features</h6>
                            $feat_data
                        </div>
                    features;

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

                    echo<<<facilities
                        <div class="mb-3">
                            <h6 class="mb-1 fw-bold dark-pink">Facilities</h6>
                            $fac_data
                        </div>
                    facilities;

                    echo<<<guests
                        <div class="guests mb-4">
                            <h6 class="mb-1mb-1 fw-bold dark-pink">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[adult] Adult/s
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[children] Child/ren
                            </span>
                        </div>
                    guests;

                    echo<<<book
                        <a href="#" class="btn w-100 text-white custom-bg shadow-none mb-1">Book Now</a>
                    book;

                    ?>
                </div>
            </div>
        </div>

        <!-- Description -->

        <div class="col-12 px-4">
            <div class="mt-4 mb-4">
                <h5 class="lobster-regular color-pink" style="font-size: 25px;">Description</h5>
                <p>
                    <?php echo $room_data['description'] ?>
                </p>
            </div>
            <div>

        <!-- Review and Rating -->

                <h5 class="lobster-regular color-pink" style="font-size: 25px;">Review & Ratings</h5>
                <div>
                    <div class="profile d-flex align-items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 20 20">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <h6 class="m-0 ms-2">RandomUser1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Reiciendis vitae, officiis accusamus consectetur a nihil 
                        saepe reprehenderit iusto laudantium ipsa.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Footer -->

<?php require('inc/footer.php'); ?>

</body>
</html>

