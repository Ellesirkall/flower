<?php 
require('inc/essentials.php');
require('inc/adminSQL.php');
adminLogin();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rooms</title>
    <?php require('inc/links.php');?>
</head>
<body>

    <?php require('inc/header.php');?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="m-2 lobster-regular color-pink" style="font-size: 35px;">Rooms</h4>

                <!-- Room section -->

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                            <i class="bi bi-plus-square color-white"> </i> Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="text-light" style="background-color: #ee6e6e;">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                   
                                </tbody>
                            </table>
                        </div>

                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Room Modal -->

    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="addRoomLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title color-pink">Add Rooms</h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" min="1" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" id="site_title_inp" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                
                                <?php 

                                    $res = selectAll('feature');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='feature' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                
                                ?>

                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                                
                                <?php 

                                    $res = selectAll('facilities');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                
                                ?>

                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-dark text-white shadow-none">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Room Modal -->

    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="editRoomLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="edit_room_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title color-pink">Edit Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" min="1" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" id="site_title_inp" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php 
                                    $res = selectAll('feature');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='feature' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                                <?php 
                                    $res = selectAll('facilities');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                        </div>
                        <input type="hidden" name="room_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-dark text-white shadow-none">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
     

                
    <?php require('inc/scripts.php');?>  
    <script>

        let add_room_form = document.getElementById('add_room_form');

        add_room_form.addEventListener('submit', function(e){
            e.preventDefault();
            add_room();
        });

        function add_room(){
            let data = new FormData(add_room_form); // Correctly bind form data
            data.append('add_room', '');

            // Append additional form data
            data.append('name', add_room_form.elements['name'].value);
            data.append('price', add_room_form.elements['price'].value);
            data.append('quantity', add_room_form.elements['quantity'].value);
            data.append('adult', add_room_form.elements['adult'].value);
            data.append('children', add_room_form.elements['children'].value);
            data.append('desc', add_room_form.elements['desc'].value);

            let feature = [];
            add_room_form.elements['feature'].forEach(element => {
                if (element.checked) {
                    feature.push(element.value);
                }
            });

            let facilities = [];
            add_room_form.elements['facilities'].forEach(element => {
                if (element.checked) {
                    facilities.push(element.value);
                }
            });

            data.append('feature', JSON.stringify(feature));
            data.append('facilities', JSON.stringify(facilities));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function(){
                var myModal = document.getElementById('add-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.status >= 200 && this.status < 300) {
                    console.log("Response:", this.responseText);
                    var response = JSON.parse(this.responseText);
                    if (response == 1) {
                        alert('success', "New Room/s Added!");
                        add_room_form.reset();
                        get_all_rooms();
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

            xhr.send(data);
        }


        function get_all_rooms(){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function(){

               document.getElementById('room-data').innerHTML = this.responseText;
            }

            xhr.send('get_all_rooms');
        }


        let edit_room_form = document.getElementById('edit_room_form');

        function edit_details(id){

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function(){
               let data = JSON.parse(this.responseText);
               edit_room_form.elements['name'].value = data.roomdata.name;
               edit_room_form.elements['price'].value = data.roomdata.price;
               edit_room_form.elements['quantity'].value = data.roomdata.quantity;
               edit_room_form.elements['adult'].value = data.roomdata.adult;
               edit_room_form.elements['children'].value = data.roomdata.children;
               edit_room_form.elements['desc'].value = data.roomdata.desc;
               edit_room_form.elements['room_id'].value = data.roomdata.id;

               edit_room_form.elements['feature'].forEach(element => {
                    if (data.feature. includes(Number(element.value))) {
                        element.checked = true;
                    }
                });

               edit_room_form.elements['facilities'].forEach(element => {
                    if (data.facilities. includes(Number(element.value))) {
                        element.checked = true;
                    }
                });

            }

            xhr.send('get_room='+id);
        }

        edit_room_form.addEventListener('submit', function(e){
            e.preventDefault();
            submit_edit_room();
        });

        function submit_edit_room(){
            let data = new FormData(add_room_form); // Correctly bind form data
            data.append('edit_room', '');

            // Append additional form data
            data.append('room_id', edit_room_form.elements['room_id'].value);
            data.append('name', edit_room_form.elements['name'].value);
            data.append('price', edit_room_form.elements['price'].value);
            data.append('quantity', edit_room_form.elements['quantity'].value);
            data.append('adult', edit_room_form.elements['adult'].value);
            data.append('children', edit_room_form.elements['children'].value);
            data.append('desc', edit_room_form.elements['desc'].value);

            let feature = [];
            edit_room_form.elements['feature'].forEach(element => {
                if (element.checked) {
                    feature.push(element.value);
                }
            });

            let facilities = [];
            edit_room_form.elements['facilities'].forEach(element => {
                if (element.checked) {
                    facilities.push(element.value);
                }
            });

            data.append('feature', JSON.stringify(feature));
            data.append('facilities', JSON.stringify(facilities));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function(){
                var myModal = document.getElementById('edit-room');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.status >= 200 && this.status < 300) {
                    console.log("Response:", this.responseText);
                    var response = JSON.parse(this.responseText);
                    if (response == 1) {
                        alert('success', "Room Edited Successfully!");
                        edit_room_form.reset();
                        get_all_rooms();
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

            xhr.send(data);
        }

        function toggle_status(id, val){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function(){

                if(this.responseText == 1){
                    alert('success', "Status Toggled!");
                    get_all_rooms();
                } else {
                    alert('error', "No Changes In Status Made!");
                }

            }

            xhr.send('toggle_status=' +id+ '&value=' +val);
        }

        window.onload = function(){
            get_all_rooms();
        }


    </script>

</body>
</html>