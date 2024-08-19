<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";


$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    
    $stmt = $conn->prepare("INSERT INTO Categories (category_name) VALUES (?)");
    $stmt->bind_param("s", $category_name);

 
    if ($stmt->execute() === TRUE) {
        echo "New category added successfully";
        header("Location: home.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
