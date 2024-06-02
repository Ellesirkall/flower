<?php 
require('inc/essentials.php');
adminLogin();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Settings</title>
    <?php require('inc/links.php');?>
</head>
<body>

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="m-2 lobster-regular color-pink" style="font-size: 35px;">Settings</h4>

                <!-- Setting section -->

                <div class="card border-0 shadow-sm mb-3 mt-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 color-pink">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square color-white"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p> 
                        
                    </div>
                </div>

                <!-- General Setting Modal -->

                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title color-pink">General Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">About Us</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="5" required></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-dark text-white shadow-none" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Setting -->

                <div class="card border-0 shadow-sm mb-3 mt-3">
                    <div class="card-body">
                        <div class="d-flex items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 color-pink">Contact Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contact-s">
                            <i class="bi bi-pencil-square color-white"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill">
                                            <span id="pn1"></span>
                                        </i>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill">
                                            <span id="pn2"></span>
                                        </i>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="ig"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-twitter"></i>
                                        <span id="tw"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Contact Setting Modal -->

                 <div class="modal fade" id="contact-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title color-pink">Contact Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address</label>
                                                    <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Link</label>
                                                    <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Phone Number (w/ +63)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="pn1" id="pn1_inp" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="pn2" id="pn2_inp" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Email</label>
                                                        <input type="text" name="email" id="email_inp" class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="fb" id="fb_inp" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="ig" id="ig_inp" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="tw" id="tw_inp" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iFrame Source</label>
                                                    <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-dark text-white shadow-none" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

                
        <?php require('inc/scripts.php');?>  

        <script>
            
            let general_data, contacts_data;
            let general_s_form = document.getElementById('general_s_form');

            let site_title_inp = document.getElementById('site_title_inp');
            let site_about_inp = document.getElementById('site_about_inp');

            let contacts_s_form = document.getElementById('contacts_s_form');

            function get_general() {
                let site_title = document.getElementById('site_title');
                let site_about = document.getElementById('site_about');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if (this.status >= 200 && this.status < 300) {
                        try {
                            general_data = JSON.parse(this.responseText);
                            console.log(general_data);

                            site_title.innerText = general_data.site_title;
                            site_about.innerText = general_data.site_about;

                            site_title_inp.value = general_data.site_title;
                            site_about_inp.value = general_data.site_about;

                        } catch (e) {
                            console.error("Error parsing JSON:", e);
                            console.log("Response:", this.responseText);
                        }
                    } else {
                        console.error("Failed to load data. Status:", this.status);
                    }
                };

                xhr.send('action=get-general');
            }

            general_s_form.addEventListener('submit', function(e){
                e.preventDefault();
                upd_general(site_title_inp.value, site_about_inp.value);
            })

            function upd_general() {
                let site_title_val = document.getElementById('site_title_inp').value;
                let site_about_val = document.getElementById('site_about_inp').value;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    var myModal = document.getElementById('general-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();
                    
                    var response = JSON.parse(this.responseText);

                    if (response.result == 1) {
                        alert('success', 'Changes Saved!');
                        get_general();
                    } else {
                        alert('error', 'No Changes Made!');
                    }
                };

                xhr.send('action=upd_general&site_title=' + encodeURIComponent(site_title_val) + '&site_about=' + encodeURIComponent(site_about_val));
            }

            function get_contacts() {
                let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'ig', 'tw'];
                let iframe = document.getElementById('iframe');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if (this.status >= 200 && this.status < 300) {
                        console.log("Raw: ", this.responseText);
                        try {
                          contacts_data = JSON.parse(this.responseText);
                          contacts_data = Object.values(contacts_data);

                            for (let i = 0; i < contacts_p_id.length; i++) {
                                document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
                            }
                            let iframeUrl = contacts_data[9]; 
                            if (iframeUrl) {
                                iframe.src = iframeUrl;
                            } else {
                                console.error("Iframe URL not found in the response data.");
                            }
                            contacts_inp(contacts_data);

                        } catch (e) {
                            console.error("Error parsing JSON:", e);
                            console.log("Response:", this.responseText);
                        }
                    } else {
                        console.error("Failed to load data. Status:", this.status);
                    }
                };

                xhr.send('action=get_contacts');
            }

            function contacts_inp(data) {
                let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'ig_inp', 'tw_inp', 'iframe_inp'];

                for (let i = 0; i < contacts_inp_id.length; i++) {
                    document.getElementById(contacts_inp_id[i]).value = data[i+1];
                }
            }

            contacts_s_form.addEventListener('submit', function(e) {
                e.preventDefault();
                upd_contacts();
            })

            function upd_contacts(){
                let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'ig', 'tw', 'iframe'];
                let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'ig_inp', 'tw_inp', 'iframe_inp'];
                let data_str = "";

                for (let i = 0; i < index.length; i++) {
                data_str += index[i] + "=" + encodeURIComponent(document.getElementById(contacts_inp_id[i]).value) + '&';
                }
                data_str += "action=upd_contacts";

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/settings_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function(){
                    var myModal = document.getElementById('contact-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if (this.status >= 200 && this.status < 300) {
                        console.log("Response:", this.responseText);
                        var response = JSON.parse(this.responseText);
                        if (response.result == 1) {
                            alert('success', "Changes Saved!");
                            get_contacts();
                        } else {
                            alert('error', "No Changes Saved!");
                        }
                    } else {
                        console.error("Failed to load data. Status:", this.status);
                    }
                };

                xhr.onerror = function() {
                    console.error("Network error occurred.");
                };

                xhr.send(data_str);
            }
            
            window.onload = function () {
                get_general();
                get_contacts();
            }
        </script>

</body>
</html>