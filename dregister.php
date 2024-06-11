
<?php

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$Email = $_POST['Email'];
$Phone_number = $_POST['Phone_number'];
$username = $_POST['username'];
$Password = $_POST['Password'];


$hashed_password = password_hash($Password, PASSWORD_DEFAULT);


$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";


$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$stmt = $conn->prepare("INSERT INTO user_reg (fname, sname, Email, Phone_number, username, Password) VALUES (?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}


$Phone_number = (int)$Phone_number;


$stmt->bind_param("sssiss", $fname, $sname, $Email, $Phone_number, $username, $hashed_password);


if ($stmt->execute()) {
    echo "Registration successful";

    header("Location: home.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
