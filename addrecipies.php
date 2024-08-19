<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Rname = $_POST['Rname'];
    $Description = $_POST['Description'];
    $ingredients = $_POST['ingredients'];
    $recipies = $_POST['recipies'];
    $Recipieowner = $_POST['Recipieowner'];

    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "foodies_register";

    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $stmt = $conn->prepare("INSERT INTO add_recipie (Rname, Description, ingredients, recipe, Recipeowner) VALUES (?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $Rname, $Description, $ingredients, $recipies, $Recipieowner);

    if ($stmt->execute()) {
        echo "New recipe added successfully";

        header("Location: userhome.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
