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
    $Rname = $_POST['Rname'];
    $Description = $_POST['Description'];
    $ingredients = $_POST['ingredients'];
    $recipies = $_POST['recipies'];
    $Recipieowner = $_POST['Recipieowner'];

    $sql = "INSERT INTO add_recipies (Rname, Description , ingredients, recipies, Recipieowner)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $Rname, $Description, $ingredients, $recipies, $Recipieowner);

    if ($stmt->execute()) {
        echo "New recipe added successfully";

        header("Location: home.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
