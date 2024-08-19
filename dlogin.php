<?php
session_start();

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";

$con = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password, user_type FROM user_reg WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $user_type);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['user_type'] = $user_type;

            if ($user_type == 'Administrator') {
                header('Location: adminhome.php');
            } else {
                header('Location: userhome.php');
            }
        } else {
            echo 'Incorrect username or password!';
        }
    } else {
        echo 'Incorrect username or password!';
    }

    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
?>
