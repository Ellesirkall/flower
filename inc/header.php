<?php
require('Admin/inc/adminSQL.php');
require('Admin/inc/essentials.php');

$contact_q = "SELECT * FROM `contacts` WHERE `id_no`=?";
$gen_q = "SELECT * FROM `settings` WHERE `id_no`=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
$gen_r =  mysqli_fetch_assoc(select($gen_q,$values,'i'));

?>


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
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
        Login
        </button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
        Register
        </button>
    </div>
    </div>
  </div>
</nav>

<!-- Log In Form -->

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" onsubmit="myaction.collect_data(event, 'login')">
                    <div class="modal-header">
                        <h5  class="modal-title d-flex align-items-center">
                            <a class="navbar-brand" href="#">
                                <img src="images/login.png" alt="" width="105" height="40" style="position: relative; top: 2px;">
                            </a>
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div><small class="my-1 js-error js-error-email text-danger"></small></div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input name="email" type="text" class="form-control p-3">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control p-3">
                        </div>
                        <div class="progress my-3 d-none">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark shadow-none">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Registration Form -->

    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
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
                                <input type="text" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="form-label" class="form-label">Surname</label>
                                <input type="text" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="form-label" class="form-label">Phone</label>
                                <input type="number" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="form-label" class="form-label">Email</label>
                                <input type="email" class="form-control shadow-none">
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="form-label" class="form-label">Postal Code</label>
                                <input type="number" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="form-label" class="form-label">Birthdate</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="form-label" class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="form-label" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control shadow-none">
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


<script>
	
	var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type',data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			myaction.send_data(myform);
		},

		send_data: function (form)
		{

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e){

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

			ajax.open('post','ajax.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			console.log(result);
			var obj = JSON.parse(result);
			if(obj.success)
			{
				alert("Login successful!");
				window.location.href = 'profile.php';
			}else{

				//show errors
				let error_inputs = document.querySelectorAll(".js-error");

				//empty all errors
				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				//display errors
				for(key in obj.errors)
				{
					document.querySelector(".js-error-"+key).innerHTML = obj.errors[key];
				}
			}
		}
	};

</script>