<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowerpath Hotel - Homepage</title>
    <?php require('inc/links.php'); ?>
    
    <style>
        .availability-form{
                margin-top: -50px;
                z-index: 2;
                position: relative;
        }
        
        @media screen and (max-width:575px) {
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;

             }
        }

    </style>
    <script
      src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
      crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </head>

<body>


<!-- Header -->

<?php require('inc/header.php'); ?>


<!-- Carousel -->

    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/banner-1.png" class="w-100 d-block"/>
                </div>
                <div class="swiper-slide">
                    <img src="images/banner-2.png" class="w-100 d-block"/>
                </div>
                <div class="swiper-slide">
                    <img src="images/banner-3.png" class="w-100 d-block"/>
                </div>
            </div>
        </div>
    </div>

<!-- Room Availability -->

<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4"><span>Check</span> Available Rooms</h5>
            <form>
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label for="form-label" style="font-weight: 500; ">Arrival Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label for="form-label" style="font-weight: 500; ">Departure Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label for="form-label" style="font-weight: 500; ">Adult</label>
                        <select class="form-select shadow-none">
                            <option selected>Select Number</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label for="form-label" style="font-weight: 500; ">Children</label>
                        <select class="form-select shadow-none">
                            <option selected>Select Number</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-lg-3 mt-2">
                        <button type="submit" class="btn btn-sm text-white shadow-none custom-bg">Check Rooms</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Room Lists -->

<div class="container top">
    <div class="heading">
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold lobster-regular">Our Rooms</h2>
    </div>
</div>

<div class="container">
    <div class="row">

        <?php 
            $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` LIMIT 3", [1,0],'ii');

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
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="$room_thumb" class="card-img-top">
                            <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6 class="mb-4"><span>₱$room_data[price]</span> per night</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    $feat_data
                                </div>
                                <div class="facilities mb-4">
                                   $fac_data
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[adult] Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[children] Children
                                    </span>
                                </div>
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Rating</h6>
                                    <span class="badge rounded-pill bg-light"></span>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                data;
                
            }

        ?>

        <div class="col-lg-12 text-center mt-5">
            <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
        </div>
    </div>
</div>

<!-- Testimonials -->

<div class="container top">
    <div class="heading">
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold lobster-regular">Testimonials</h2>
    </div>
</div>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper">

              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
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

              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
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

              <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
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
            <div class="swiper-pagination"></div>
        </div>
    </div>

<!-- Reach Us -->

<div class="container top">
    <div class="heading">
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold lobster-regular">Reach Us</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100" height="450" src="<?php echo $contact_r ['iframe']?>" 
                    loading="lazy">
            </iframe>
        </div>
        <div class="col-lg-4  col-md-4">
            <div class="bg-white p-4 rounded mb-4">
                <h5 class="mt-2 dark-pink lobster-regular">Call Us</h5>
                <a href="tel: +<?php echo $contact_r ['pn1']?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill color-pink lobster-regular">  +<?php echo $contact_r ['pn1']?></i>
                </a>
                <br>
                <!-- if there is no phone number 2, it will not show on the website -->
                <?php if ($contact_r['pn2']!= '')
                {
                    echo<<<data
                        <a href="tel: +$contact_r[pn2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill color-pink lobster-regular"> +$contact_r[pn2]</i>
                        </a>
                    data;
                }
                ?>
            </div>
            <div class="bg-white p-4 rounded mb-4">
                <!-- This function hides facebook if there is no link in the settings in the admin panel-->
                <h5 class="dark-pink lobster-regular">Follow Us</h5>
                <?php
                    if ($contact_r['fb'] != '')
                    {
                        echo<<<data
                            <a href="$contact_r[fb]" class="d-inline-block mb-3">
                            <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-facebook color-pink"> Facebook</i> 
                            </span>
                            </a>
                            <br>
                    data;
                    }
                ?>
                <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram color-pink"> Instagram</i> 
                    </span>
                </a>
                <br>
                <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-twitter color-pink"> Twitter</i> 
                    </span>
                </a>
                <br>
                
            </div>

        </div>
    </div>
</div>

<br>
<br>

<!-- Footer -->

<?php require('inc/footer.php'); ?> 
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
</script>
<script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
    });
</script>
<script>
     var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",  
      loop: true, 
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
            slidesPerView: "1"
        },
        640: {
            slidesPerView: "1"
        },
        768: {
            slidesPerView: "2"
        },
        1024: {
            slidesPerView: "3"
        },
      }
    });
</script>
</body>
</html>

