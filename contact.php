<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowerpath Hotel - Contact Us</title>
    <meta name="description" content="Learn more about Flowerpath Hotel, our mission, achievements, and the exceptional services we offer to make your stay unforgettable.">
    <?php require('inc/links.php'); ?>
</head>
<body>
    <!-- Header -->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h1 class="fw-bold lobster-regular text-center color-pink">Contact Us</h1>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, deserunt sunt! Iusto similique consequuntur sint repudiandae corporis animi fuga libero.
        </p>
        <hr color="#faa2a7"/>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 px-4">

                <div class="bg-white rounded shadow p-4 box">
                    <iframe class="w-100 rounded mb-4 shadow-none" height="450" src="<?php echo $contact_r['iframe']?>" loading="lazy"></iframe>
                    
                    <h5 class="dark-pink lobster-regular">Address</h5>
                    <a href="<?php echo $contact_r['gmap']?>" target="_blank" class="d-inline-block mb-2 text-decoration-none color-pink">
                    <i class="bi bi-geo-alt-fill fw-bold"> <?php echo $contact_r['address']?></i>
                    </a>
                    
                    <hr>

                    <h5 class="mt-2 dark-pink lobster-regular">Call Us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill color-pink lobster-regular">  +<?php echo $contact_r['pn1']?></i>
                    </a>
                    <br>
                    <?php
                    if ($contact_r['pn2'] != '0') 
                    {   
                    echo<<<data
                         <a href="tel: +< $contact_r[pn2]" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill color-pink lobster-regular"> +$contact_r[pn2]</i>
                        </a>
                    data;
                    }


                    ?>
                   
                    <hr>

                    <h5 class="mt-2 dark-pink lobster-regular">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email']?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-heart color-pink lobster-regular"> <?php echo $contact_r['email']?></i>
                    </a>

                    <hr>
                   
                    <h5 class="mt-2 dark-pink lobster-regular">Follow Us</h5>

                    <?php 
                        if ($contact_r['fb'] != '')
                        {
                        echo<<<data
                            <a href="$contact_r[fb]" class="d-inline-block fs-5 me-2">
                                <i class="bi bi-facebook color-pink"></i>
                            </a>
                            data;
                        }
                        if ($contact_r['ig'] != '') {
                            echo<<<data
                                <a href="$contact_r[ig]" class="d-inline-block mb-3">
                                    <span class="badge bg-light text-dark fs-6 p-2">
                                        <i class="bi bi-instagram color-pink"></i>
                                    </span>
                                </a>                                
                            data;
                        }
                        if ($contact_r['tw'] != '') {
                            echo<<<data
                                <a href="$contact_r[tw]" class="d-inline-block">
                                    <span class="badge bg-light text-dark fs-6 p-2">
                                        <i class="bi bi-twitter color-pink"></i>
                                    </span>
                                </a>
                            data;
                        }

                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5 class="dark-pink lobster-regular" style="font-size: x-large;">Send a message</h5>
                        <div class="mb-3">
                            <label class="form-label color-pink fw-bold">Name:</label>
                            <input name="name" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label color-pink fw-bold">E-mail:</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label color-pink fw-bold">Subject:</label>
                            <input name="subject" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label color-pink fw-bold">Message:</label>
                            <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn btn-dark shadow-none mt-2">SEND</button>
                    </form>
                </div>
            </div>
            <div>
                <p class="text-center mt-3">
                   
                </p>
            </div>
        </div>
    </div>

    <?php 
    
    if(isset($_POST['send'])){
        $form_data = sanitization($_POST);
        
        $query = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
        $values = [$form_data['name'], $form_data['email'], $form_data['subject'], $form_data['message']];
        $res = insert($query, $values, 'ssss');
        if($res==1) {
            alert('success', 'Mail sent!');
        } else {
            alert('success', 'Mail not sent! Try again later.');
        }
    }
    
    
    
    
    ?>






    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>
</html>
