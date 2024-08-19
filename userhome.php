<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: dlogin.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css">
    <style>
        .username {
            padding-left: 35px;
            padding-right: 35px;
            font-size: 16px;
            color: black;
            display: inline-block;
            text-align: center;
            height: 70px;
            line-height: 70px;
            background-color: white;
            text-decoration: none;
            border: none;
            margin-left: 15px;
        }
        .username:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body id="main-layout" style="border: none;">
    <nav>
        <div class="container">
            <div class="logo">
                <img style="height: 75px;" src="images/FOODIES.png" alt="my logo">
            </div>
            <div class="navigation" style="background-color: white;">

                <img style="height: 70px; width: 280px; margin-left:-100px;" src="images/Savor the Flavor.png" alt="">

                <button style="margin-left: 105px; border-right: none;" class="b-nav">
                    <a href="about.html" style="padding-left: 35px; padding-right: 35px;">About</a>
                </button>
                <button style="border-right: none;" class="b-nav">
                    <a href="services.html" style="padding-left:35px; padding-right: 35px;">Services</a>
                </button>
                <button style="border-right: none;" class="b-nav">
                    <a href="contacts.html" style="padding-left: 35px; padding-right: 35px;">Contact</a>
                </button>
                <button style="border-right: none;" class="b-nav">
                    <a href="categories.html" style="padding-left: 35px; padding-right: 35px;">Category</a>
                </button>
                <button class="b-nav">
                    <a href="logout.php" style="padding-left: 35px; padding-right: 35px;">Logout</a>
                </button>
                <span class="username"><?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </nav>
    <div class="above-fold">
        <div class="fold-image">
            <img style="width: 100%; height:750px;" src="images/arrangement-tasty-pizza-dough.jpg" alt="">
            <div style="margin-top: -600px;">
                <h1 style="font-size: 55px; text-align: center; font-style: italic; font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Join our community of recipies</h1>
                <h2 style="font-size: 30px; text-align: center; font-style: italic;">Find Delicious Recipies</h2>
                <div style="text-align: center;">
                    <button class="button" style="background-color: wheat;">
                        <p><a style="color:black; background-color: wheat;" href="displayrecipie.php">Recipies</a></p>
                    </button>
                </div>
                <div style="text-align: center;">
                    <button class="button" style="margin-top: 10px; margin-left: 508px; background-color: wheat;">
                        <p><a style="color:black; background-color: wheat;" href="Addrecipies.html">Add_recipie</a></p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 0px; padding-left: 50px; padding-right: 50px;">
        <div class="outline">
            <div class="benefits">
                <img style="width: 350px; height: 200px; margin-top: 80px;" src="images/pexels-ella-olsson-572949-1640777.jpg" alt="">
                <h2>Embark On Healthy Delicacies</h2>
                <p style="font-size: 18px;">Discover nutritious recipes and tips for a vibrant life. Dive into fresh produce, grains, and lean proteins as you explore your path to wellness with us. Join us on this flavorful journey!</p>
            </div>
            <div class="benefits">
                <img style="width: 350px; height: 200px; margin-top: 80px;" src="images/pexels-klaus-nielsen-6287298.jpg" alt="">
                <h2>Perfect Your Culinary Skills</h2>
                <p style="font-size: 18px;">Elevate your cooking skills with our curated recipes and expert tips. From beginner basics to advanced techniques, we're here to guide your culinary journey. Let's cook up something delicious together!</p>
            </div>
            <div class="benefits">
                <img style="width: 350px; height: 200px; margin-top: 80px;" src="images/pexels-brigitte-tohm-36757-239581.jpg" alt="">
                <h2>Dive Into Delicious Desserts</h2>
                <p style="font-size: 18px;">Dive into our tempting array of treats. From cakes to puddings, our recipes will satisfy every craving. Join us in exploring the world of delicious desserts!</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="About">
            <h1>About Us</h1>
            <p style="font-size: 18px;">
                Welcome to our recipe book haven, where culinary inspiration meets simplicity! At our heart, we're dedicated to bringing the joy of cooking into your home with a treasure trove of delicious recipes. Whether you're a seasoned chef or just beginning your culinary journey, our user-friendly platform is designed to make every step of the cooking process a breeze. From comforting classics to innovative creations, our diverse collection ensures there's something for every taste and occasion. So, grab your apron, gather your ingredients, and let's embark on a flavorful adventure together. Welcome to a world of endless possibilities in the kitchen!
            </p>
        </div>
        <div>
            <img class="about" style="width: 550px; height: 300px;" src="images/pexels-george-milton-7034232.jpg" alt="">
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
