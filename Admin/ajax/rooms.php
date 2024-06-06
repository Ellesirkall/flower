<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../inc/adminSQL.php');
require('../inc/essentials.php');
adminLogin();

header('Content-Type: application/json');

if (isset($_POST['add_room'])) {

    $feature = sanitization(json_decode($_POST['feature']));
    $facilities = sanitization(json_decode($_POST['facilities']));

    $form_data = sanitization($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `rooms` (`name`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?)";
    $values = [$form_data['name'], $form_data['price'], $form_data['quantity'], $form_data['adult'], $form_data['children'], $form_data['desc']];

    if (insert($q1, $values, 'siiiis')) {
        $flag = 1;
    }

    $room_id = mysqli_insert_id($con);

    $q2 = "INSERT INTO `room_facilities` (`room_id`, `facilities_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {

        foreach($facilities as $f){
            mysqli_stmt_bind_param($stmt, 'ii', $form_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('query cannot be prepared - insert');
    }


    $q3 = "INSERT INTO `room_features` (`room_id`, `features_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q3)) {

        foreach($feature as $f){
            mysqli_stmt_bind_param($stmt, 'ii', $form_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('query cannot be prepared - insert');
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
} 


if (isset($_POST['get_all_rooms'])) {

    $res = selectAll('rooms');
    $i=1;

    $data = '';

    while($row = mysqli_fetch_assoc($res)){

        if ($row['status'] == 1) {
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>
            ";
        } else {
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-dark btn-sm shadow-none'>Inactive</button>
            ";
        }

        $data .= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[name]</td>
                <td>
                    <span class='badge rounded-pill bg-light text-dark'>
                        Adult: $row[adult]
                    </span><br>
                    <span class='badge rounded-pill bg-light text-dark'>
                        Children: $row[children]
                    </span>
                </td>
                <td>₱$row[price]</td>
                <td>$row[quantity]</td>
                <td>$status</td>
                <td>
                <button type='button' onclick='edit_details($row[id])' class='btn btn-dark shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                            <i class='bi bi-pencil-square color-white'> </i> Edit
                            </button>   
                </td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}
if (isset($_POST['get_room'])) 
{
    $form_data = sanitization($_POST);
    $res1 = select("SELECT * FROM `rooms` WHERE `id`=?",[$form_data['get_room']],'i');
    $res2 = select("SELECT * FROM `room_features` WHERE `id`=?",[$form_data['get_room']],'i');
    $res3 = select("SELECT * FROM `room_facilities` WHERE `id`=?",[$form_data['get_room']],'i');

    $roomdata = mysqli_fetch_assoc($res1);
    $features = [];
    $facilities = [];
    
    if(mysqli_num_rows($res2)>0)
    {
        while($row = mysqli_fetch_assoc($res2))
        {
            array_push($features,$row['features_id']);
        }
    }

    if(mysqli_num_rows($res3)>0)
    {
        while($row = mysqli_fetch_assoc($res3))
        {
            array_push($facilities,$row['facilities_id']);
        }
    }

    $data = ["roomdata" => $roomdata, "features" => $features, "facilities" => $facilities];
    $data = json_encode($data);

    echo $data;
}
if (isset($_POST['edit_room']))
{
    $feature = sanitization(json_decode($_POST['feature']));
    $facilities = sanitization(json_decode($_POST['facilities']));

    $form_data = sanitization($_POST);
    $flag = 0;

    $q1 = "UPDATE `rooms` SET `name`=?,`price`=?,`quantity`=?,
    `adult`=?,`children`=?,`description`=?,`status`=?,`removed`=? WHERE `id`=?";
     $values = [$form_data['name'], $form_data['price'], $form_data['quantity'], 
     $form_data['adult'], $form_data['children'], $form_data['desc'], $form_data['room_id']];


     if(update($q1,$values,'siiiiisi'))
     {
        $flag = 1;
     }

     $del_features = delete("DELETE  FROM `room_features` WHERE `room_id`=?",[$form_data['room_id']],'i');
     $del_facilities = delete("DELETE  FROM `room_facilities` WHERE `room_id`=?",[$form_data['room_id']],'i');

     if (!($del_facilities && $del_features))
     {
        $flag = 0;
     }

    $q2 = "INSERT INTO `room_facilities` (`room_id`, `facilities_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {

        foreach($facilities as $f){
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('query cannot be prepared - insert');
    }


    $q3 = "INSERT INTO `room_features` (`room_id`, `features_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q3)) {

        foreach($feature as $f){
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('query cannot be prepared - insert');
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }

} 

if (isset($_POST['toggle_status']))
{
    $form_data = sanitization($_POST);
    $q = 'UPDATE `rooms` SET `status`=? WHERE `id`=?';
    $v = [$form_data['val'],$form_data['toggle_status']];

    if(update($q,$v,'ii'))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }

}


?>