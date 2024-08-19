<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: dlogin.html');
    exit();
}

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodies_register";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM add_recipie WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $recipe = $result->fetch_assoc();
} else {
    exit('No recipe ID specified!');
}

if (isset($_POST['submit'])) {
    $Rname = $_POST['Rname'];
    $Description = $_POST['Description'];
    $ingredients = $_POST['ingredients'];
    $recipe_content = $_POST['recipe'];
    $Recipeowner = $_POST['Recipeowner'];
    
    $update_query = "UPDATE add_recipie SET Rname=?, Description=?, ingredients=?, recipe=?, Recipeowner=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssi", $Rname, $Description, $ingredients, $recipe_content, $Recipeowner, $id);
    $stmt->execute();
    
    header('Location: displayrecipie.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <style>
        .form-container {
            width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            margin-top: 80px;
        }
        .form-container label {
            display: block;
            margin: 10px 0 5px;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
      
    </style>
</head>
<body>
<style>body {background-image: url('images/pexels-klaus-nielsen-6287298.jpg'); background-size: cover;}</style>

<div class="form-container">
 
    <h2>Edit Recipe</h2>
    <form method="post" action="">
        <label for="Rname">Name:</label>
        <input type="text" id="Rname" name="Rname" value="<?php echo $recipe['Rname']; ?>" required>
        
        <label for="Description">Description:</label>
        <textarea id="Description" name="Description" required><?php echo $recipe['Description']; ?></textarea>
        
        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" required><?php echo $recipe['ingredients']; ?></textarea>
        
        <label for="recipe">Recipe:</label>
        <textarea id="recipe" name="recipe" required><?php echo $recipe['recipe']; ?></textarea>
        
        <label for="Recipeowner">Recipe Owner:</label>
        <input type="text" id="Recipeowner" name="Recipeowner" value="<?php echo $recipe['Recipeowner']; ?>" required>
        
        <input type="submit" name="submit" value="Update">
    </form>
    
</div>
</body>
</html>

<?php
$conn->close();
?>
