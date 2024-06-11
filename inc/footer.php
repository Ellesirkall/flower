<div class="container-fluid bg-dark mt-5" style="background-color: #3d3636; color: white; padding: 1rem; margin: 0;">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 p-4">
            <img src="images/logo.png" class="fs-3 mb-2" width="170" height="35">
            <?php 
              if ($gen_r['site_about'] != '')
              {
                echo<<<data
                    <p class="text-white">
                        $gen_r[site_about]
                    </p>
                data;
                
              }
              ?>
            
        </div>
        <div class="col-lg-4 p-4 text-white">
            <h5 class="mb-3 ">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-white text-decoration-none">Home</a><br>
            <a href="about.php" class="d-inline-block mb-2 text-white text-decoration-none">About</a><br>
            <a href="rooms.php" class="d-inline-block mb-2 text-white text-decoration-none">Rooms</a><br>
            <a href="contact.php" class="d-inline-block mb-2 text-white text-decoration-none">Contact Us</a>
        </div>
        <div class="col-lg-4 p-4 text-white">
           <h5 class="mb-3 ">Follow Us</h5>
           <?php 
              if ($contact_r['fb'] != '')
              {
                echo<<<data
                  <a href="$contact_r[fb]" class="d-inline-block text-white text-decoration-none mb-2">
                    <i class="bi bi-facebook"></i> Facebook
                </a><br>
                data;
                
              }
              if ($contact_r['ig'] != '')
              {
                echo<<<data
                    <a href="$contact_r[ig]" class="d-inline-block text-white text-decoration-none mb-2">
                            <i class="bi bi-instagram"></i> Instagram</i>
                        </span>
                    </a><br>
                data;
              }
            if ($contact_r['tw'] != '') {
                echo<<<data
                    <a href="$contact_r[tw]" class="d-inline-block text-white text-decoration-none mb-2">
                            <i class="bi bi-twitter"></i> Twitter</i>
                        </span>
                    </a><br>
                data;
            }
           ?>
        </div>
    </div>
</div>

<hr style="margin:0;">

<h6 class="fw-bold bg-dark text-white p-3 m-0">Machine Project 2 : All rights reserved</h6>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
</script>