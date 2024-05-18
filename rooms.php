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

        <div class="col-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch lp-bg">
                    <h4 class="mt-2 lobster-regular color-white">Filters</h4>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    </div>
                </div>
            </nav>
        </div>

    </div>
</div>





<!-- Footer -->

<?php require('inc/footer.php'); ?>

</body>
</html>

