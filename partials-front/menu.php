<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickBite</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <section class="navbar">
        <div class="containerNav">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/quickbite.png" alt="Restaurant Logo">
                </a>
                <h1>QuickBite</h1>
            </div>
            <div>
                <img src="images/menu.png" alt="menu" class="menu-logo" onclick="toggleMenu()">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <script>
                function toggleMenu() {
                    var menu = document.querySelector('.menu');
                    menu.classList.toggle('show');
                }
            </script>

        </div>
    </section>