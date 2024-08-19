<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM add_recipie";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            font-size: 20px;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .RecipieTb {
            background-color: white;
            border: none;
            border-radius: 15px;
            width: 1200px;
            padding: 25px;
            text-align: center;
            margin: 0 auto;
            margin-top: 150px;
        }
    </style>
</head>
<body style="">
<style>body {background-image: url('images/pexels-psco-139259.jpg'); background-size: cover;}</style>

<div class="RecipieTb">
    <h2 style="text-align:center; color:orange">Choose from various recipies</h2>
    <table>
        <tr style="color:orange">
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Ingredients</th>
            <th>Recipe</th>
            <th>Recipe Owner</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["Rname"]."</td>
                        <td>".$row["Description"]."</td>
                        <td>".$row["ingredients"]."</td>
                        <td>".$row["recipe"]."</td>
                        <td>".$row["Recipeowner"]."</td>
                        <td><a href='edit_recipie.php?id=".$row["id"]."'>Edit</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No recipes found</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
