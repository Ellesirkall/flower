<!-- Navigation Bar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="images/logo.png" alt="" width="200" height="45">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-2" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  me-2" href="about.php">About</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link  me-2" href="rooms.php">Rooms</a>
        </li> 
        </li> 
        <li class="nav-item">
          <a class="nav-link  me-2" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php 
            
            if(isset($_SESSION['login']) && $_SESSION['login']==true){
                $path = USERS_IMG_PATH;
                echo<<<data
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <img src="$path$_SESSION[uPic]" style="width 25px; height: 25px;" class="me-1">
                            $_SESSION[uName]
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                data;
            } else {
                echo<<<data
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
                data;
            }

        ?>
        
    </div>
    </div>
  </div>
</nav>

<!-- Log In Form Modal -->

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form">
                    <div class="modal-header">
                        <h5  class="modal-title d-flex align-items-center">
                            <a class="navbar-brand" href="#">
                                <img src="images/login.png" alt="" width="105" height="40" style="position: relative; top: 2px;">
                            </a>
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="text" class="form-control p-3">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input name="pass" type="password" class="form-control p-3">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark shadow-none">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Registration Form Modal -->

    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="register-form">
                    <div class="modal-header">
                        <h5  class="modal-title d-flex align-items-center">
                            <a class="navbar-brand" href="#">
                                <img src="images/register.png" alt="" width="140" height="40" style="position: relative; top: 2px;">
                            </a>
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID (valid id or any government issued ID) 
                            as that will be required during check-in.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="form-label" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="form-label" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="form-label" class="form-label">Phone #</label>
                                    <input name="pn" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="form-label" class="form-label">Picture</label>
                                    <input name="profile" type="file" accept=".jpg, .webp, .png, .jpeg" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="form-label" class="form-label">Postal Code</label>
                                    <input name="posc" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="form-label" class="form-label">Birthdate</label>
                                    <input name="bd" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="form-label" class="form-label">Password</label>
                                    <input name="pw" type="password" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="form-label" class="form-label">Confirm Password</label>
                                    <input name="cpw" type="password" class="form-control shadow-none" required>
                                </div>
                            </div>
                            <div>
                            <div class="text-center my-3"></div>
                            <button type="submit" class="btn btn-dark shadow-none">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>