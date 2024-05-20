<?php 

require('inc/adminSQL.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log</title>
    <?php require('inc/links.php'); ?>
    <style>
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body>

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="custom-bg text-white py-3">Admin Login Panel</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn btn-dark shadow-none">Log In</button>
            </div>
        </form>
    </div>

<?php 
if (isset($_POST['login'])) {
    $form_data = sanitization($_POST);
    if (is_array($form_data)) {
        $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
        $values = [$form_data['admin_name'], $form_data['admin_pass']];
        $result = select($query, $values, "ss");
        if ($result) {
            print_r($result);
        } else {
            echo "No results found or there was an error with the query.";
        }
    }
}
?>

    <?php require('inc/scripts.php'); ?>
</body>
</html>