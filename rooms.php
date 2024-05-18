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
<body class="bg-light">


<!-- Header -->

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h1 class="fw-bold lobster-regular text-center color-pink">Our Rooms</h1>
    <hr>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
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

        <div class="col-ldg-9 col-md-12 px-4">
            <div class="card mb-4">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
        </div>

    </div>
</div>


<br><br><br><br>
<br><br><br><br>


<!-- Footer -->

<?php require('inc/footer.php'); ?>

</body>
</html>

