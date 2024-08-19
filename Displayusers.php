<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_reg";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
       font-size: 20px;
       font-weight: 400;
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
        .UserTb{
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
<body>
    <style>body{background-image: url('images/pexels-goumbik-349610.jpg'); background-size: cover;}</style>

    <div class="UserTb">
    <h2 style=" text-align: center; color :orange;">User Registration Table</h2>
    <table>
        <tr style="color:orange">
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Username</th>
            <th>User Type</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."</td><td>".$row["sname"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_number"]."</td><td>".$row["username"]."</td><td>".$row["user_type"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found</td></tr>";
        }
        ?>
    </table>

    </div>
</body>
</html>

<?php
$conn->close();
?>
