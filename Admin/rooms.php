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
                        <h5 class="modal-title lobster-regular color-pink">Add Rooms</h5>
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
                        <h5 class="modal-title lobster-regular color-pink">Edit Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" name="children" class="form-control shadow-none" required>
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
     
    <!-- Manage room images modal -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title lobster-regular color-pink">Room Name</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="image-alert"></div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold color-pink">Add image</label>
                            <!-- this just accepts images for the rooms -->
                            <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                            <button class="btn btn-dark text-white shadow-none">
                                <i class="bi bi-plus-square color-white"> </i>Add
                            </button>
                            <input type="hidden" name="room_id">
                        </form>
                    </div>
                    <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="text-light" style="background-color: #ee6e6e; position: sticky-top;">
                                    <th scope="col" width="60%">Image</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="room-image-data"></tbody>
                        </table>
                    </div>
                </div>       
            </div>
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

        function edit_details(id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.status >= 200 && this.status < 300) {
                    let data = JSON.parse(this.responseText);
                    if (data.roomdata) {
                        edit_room_form.elements['name'].value = data.roomdata.name;
                        edit_room_form.elements['price'].value = data.roomdata.price;
                        edit_room_form.elements['quantity'].value = data.roomdata.quantity;
                        edit_room_form.elements['adult'].value = data.roomdata.adult;
                        edit_room_form.elements['children'].value = data.roomdata.children;
                        edit_room_form.elements['desc'].value = data.roomdata.description;
                        edit_room_form.elements['room_id'].value = data.roomdata.id;

                        document.querySelectorAll("input[name='feature']").forEach(element => {
                            element.checked = data.feature.includes(Number(element.value));
                        });

                        document.querySelectorAll("input[name='facilities']").forEach(element => {
                            element.checked = data.facilities.includes(Number(element.value));
                        });

                    } else {
                        console.error("Invalid room data:", data);
                    }
                } else {
                    console.error("Failed to load data. Status:", this.status);
                }
            };

            xhr.onerror = function() {
                console.error("Network error occurred.");
            };

            xhr.send('get_room=' + id);
        }

        edit_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            submit_edit_room();
        });

        function submit_edit_room() {
            let data = new FormData(edit_room_form);
            data.append('edit_room', '');

            let feature = [];
            document.querySelectorAll("input[name='feature']:checked").forEach(element => {
                feature.push(element.value);
            });

            let facilities = [];
            document.querySelectorAll("input[name='facilities']:checked").forEach(element => {
                facilities.push(element.value);
            });

            data.append('feature', JSON.stringify(feature));
            data.append('facilities', JSON.stringify(facilities));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                if (this.status >= 200 && this.status < 300) {
                    let myModal = bootstrap.Modal.getInstance(document.getElementById('edit-room'));
                    myModal.hide();

                    let response = JSON.parse(this.responseText);
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

            };

            xhr.send('toggle_status=' +id+ '&value=' +val);
        }

        let add_image_form = document.getElementById('add_image_form');
        add_image_form.addEventListener('submit', function(e){
            e.preventDefault();
            add_image();
        });

        function add_image() {
            let data = new FormData();
            data.append('image', add_image_form.elements['image'].files[0]);
            data.append('room_id', add_image_form.elements['room_id'].value);
            data.append('add_image', ''); 

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                if(this.responseText == 'inv_img') {
                    alert('error', 'File extension wrong. Must be jpg, png, jpeg, webp only', 'image-alert');
                } else if(this.responseText == 'inv_size') {
                    alert('error', 'Image should be less than 2MB!', 'image-alert');
                } else if(this.responseText == 'upd_failed') {
                    alert('error', 'Image upload failed!');
                } else {
                    alert('success', 'New image added!', 'image-alert');
                    room_images(add_image_form.elements['room_id'].value, document.querySelector("#room-images .modal-title").innerText);
                    add_image_form.reset();
                }
            };

            xhr.send(data);
        }

        function room_images(id, rname) {
            document.querySelector("#room-images .modal-title").innerText = rname;
            add_image_form.elements['room_id'].value = id;

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('room-image-data').innerHTML = this.responseText;
                } else {
                    console.error('Failed to fetch images');
                }
            };
            xhr.send("get_room_images=" + id);
        }

        function rem_image(img_id, room_id) {
            let data = new FormData();
            data.append('image_id', img_id);
            data.append('room_id', room_id);
            data.append('rem_image', ''); 

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    if (this.responseText == 1) {
                        alert('success', 'Image removed!', 'image-alert');
                        room_images(room_id, document.querySelector("#room-images .modal-title").innerText);                   
                    } else {
                        alert('error', 'Image deletion failed!', 'image-alert');
                    }
                } else {
                    console.error('Failed to delete image');
                }
            }

            xhr.send(data);
        }

        function thumb_image(img_id, room_id) {
            let data = new FormData();
            data.append('image_id', img_id);
            data.append('room_id', room_id);
            data.append('thumb_image', ''); 

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    if (this.responseText == 1) {
                        alert('success', 'Image thumbnail changed!', 'image-alert');
                        room_images(room_id, document.querySelector("#room-images .modal-title").innerText);                   
                    } else {
                        alert('error', 'Image replacement failed!', 'image-alert');
                    }
                } else {
                    console.error('Failed to change thumbnail');
                }
            };

            xhr.send(data);
        }

        
        function remove_room(room_id) {
            if (confirm("Are you sure you want to delete this room?")) {
                let data = new FormData();
                data.append('room_id', room_id);
                data.append('remove_room', ''); 

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/rooms.php", true);

                xhr.onload = function() {
                    if (this.status === 200) {
                        if (this.responseText == 1) {
                            alert('success', 'Room removed successfully!', 'image-alert');                  
                        } else {
                            alert('error', 'Operation Failed!', 'image-alert');
                        }
                        // Ensure the alert is shown before refreshing the room list
                        get_all_rooms();
                    } else {
                        console.error('Room Deletion Failed');
                    }
                };

                xhr.send(data);
            }
        }

            

        window.onload = function(){
            get_all_rooms();
        }


    </script>

</body>
</html>