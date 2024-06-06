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
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
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
            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
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
            $status = "<button class='btn btn-dark btn-sm shadow-none'>Active</button>
            ";
        } else {
            $status = "<button class='btn btn-dark btn-sm shadow-none'>Inactive</button>
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
                <td>Buttons</td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}



?>