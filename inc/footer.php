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

<script>

function alert(type, msg, position='body'){
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show" style="position: fixed; top: 80px; right: 25px; z-index: 1111;" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    `;

    if (position === 'body') {
        document.body.appendChild(element);
    } else {
        document.getElementById(position).appendChild(element);
    }

    setTimeout(remAlert, 3000);
}

function remAlert(){
    let alertElement = document.querySelector('.alert');
    if (alertElement) {
        alertElement.remove();
    }
}

let register_form = document.getElementById('register-form');

register_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('pn', register_form.elements['pn'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('posc', register_form.elements['posc'].value);
    data.append('bd', register_form.elements['bd'].value);
    data.append('pw', register_form.elements['pw'].value);
    data.append('cpw', register_form.elements['cpw'].value);
    data.append('profile', register_form.elements['profile'].files[0]);
    data.append('register', '');

    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_reg.php", true);

    xhr.onload = function(){
        console.log(this.responseText);
        if(this.responseText == 'pass_mismatch'){
            alert('error', "Password Mismatch!");
            
        }  else if(this.responseText == 'email_exist'){
            alert('error', "Email is already registered!");

        } else if(this.responseText == 'phone_exist'){
            alert('error', "Phone number is already existing!");

        } else if(this.responseText == 'inv_img'){
            alert('error', "Invalid file extension!");

        } else if(this.responseText == 'upd_failed'){
            alert('error', "Image upload failed");

        } else if(this.responseText == 'insert_fail'){
            alert('error', "Registration failed.");

        } else {
            alert('success', "Registration Successful!");
            register_form.reset();
            
        }
    }

    xhr.send(data);



});

let login_form = document.getElementById('login-form');

login_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('email', login_form.elements['email'].value);
    data.append('pass', login_form.elements['pass'].value);
    data.append('login', '');

    var myModal = document.getElementById('loginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_reg.php", true);

    xhr.onload = function(){
        console.log(this.responseText);
        if(this.responseText == 'inv_email'){
            alert('error', "Wrong email!");
            
        }  else if(this.responseText == 'inactive'){
            alert('error', "Account Suspended!");

        } else if(this.responseText == 'invalid_pass'){
            alert('error', "Email doesn't match password!");

        } else {
            window.location = window.location.pathname;
        }
    }

    xhr.send(data);



});

</script>