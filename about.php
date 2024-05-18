<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowerpath Hotel - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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
    <h2 class="fw-bold lobster-regular text-center">ABOUT</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Hic ipsam ex aliquam voluptatem <br> repellendus asperiores 
        sapiente laborum, quisquam ipsum iusto.
    </p>
</div>

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class="mb-3 lobster-regular">Lorem ipsum dolor sit</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Omnis minima sapiente aliquam sed officia nostrum fuga?
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Omnis minima sapiente aliquam sed officia nostrum fuga?
            </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4 order-lg-1 order-md-2 order-1">
            <img src="images/about.png" class="w-200">
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/hotel.png" width="90px">
                <h4  class="mt-3 lobster-regular">10+ Rooms</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/customer.png" width="90px">
                <h4  class="mt-3 lobster-regular">10+ Customers</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/rating.png" width="90px">
                <h4  class="mt-3 lobster-regular">10+ Ratings</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/staff.png" width="100px">
                <h4  class="mt-3 lobster-regular">10+ Staffs</h4>
            </div>
        </div>
    </div>
</div>







<!-- Footer -->

<?php require('inc/footer.php'); ?>

</body>
</html>

