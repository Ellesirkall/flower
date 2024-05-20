<?php 

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'pathflowerhotel';

$con = mysqli_connect($hname, $uname, $pass, $db);

if(!$con){
    die('Cannot connect to database'. mysqli_connect_error());
}

function sanitization($data) {
    $sanitized = [];
    foreach ($data as $key => $value) { 
        $sanitized[$key] = trim($value);
        $sanitized[$key] = stripslashes($sanitized[$key]);
        $sanitized[$key] = htmlspecialchars($sanitized[$key]);
        $sanitized[$key] = strip_tags($sanitized[$key]);
    }
    return $sanitized;
}

function select($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    try {
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                return $result;
            } else{
                throw new Exception("Query cannot be executed - Select");
            }

            mysqli_stmt_close($stmt);
        }
        else{
            throw new Exception("Query cannot be prepared - Select");
        }
    } catch (Exception $e) {
        // Handle exception
        echo "Error: " . $e->getMessage();
    }
}
?>