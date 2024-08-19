<?php

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$Email = $_POST['Email'];
$Phone_number = $_POST['Phone_number'];
$username = $_POST['username'];
$Password = $_POST['Password'];
$user_type = $_POST['user_type'];
$special_password = isset($_POST['special_password']) ? $_POST['special_password'] : null;

// Define the special password for administrators
$admin_special_password = "admin123";

// Check if the user type is Administrator and verify the special password
if ($user_type == 'Administrator' && $special_password !== $admin_special_password) {
    die("Invalid special password for administrator.");
}

$hashed_password = password_hash($Password, PASSWORD_DEFAULT);

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO user_reg (fname, sname, Email, Phone_number, username, Password, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$Phone_number = (int)$Phone_number;

$stmt->bind_param("sssisss", $fname, $sname, $Email, $Phone_number, $username, $hashed_password, $user_type);

if ($stmt->execute()) {
    echo "Registration successful";

    if ($user_type == 'Administrator') {
        header("Location: adminhome.php");
    } else {
        header("Location: userhome.php");
    }
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
