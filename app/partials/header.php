<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RMIT - Ecommerce</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://kit.fontawesome.com/25adc7f9b5.js" crossorigin="anonymous"></script>
    <script src="js/search_bar.js"></script>
</head>
<body>

    <header>
        <nav class="flex justify-between items-center">
            <div class="left flex items-center gap-xl">
                <div id="logo">
                    <a href="/">
                        <img src="" alt="" />
                    </a>
                </div>
                <div>
                    <form action="/">
                        <label class="flex gap-0">
                            <input type="text" id="searchbar" placeholder="Search something ..." class="rad-none rad-left-md"/>
                            <button class="btn btn-square bg-red text-md text-white rad-right-md" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </label>
                    </form>
                </div>
            </div>
            <div class="right-menu flex gap-xl">
                <ul class="flex gap-xl">
                    <li>
                        <a href="my-account.php">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                </ul>
                <button class="btn btn-md rad-md text-white font-bold bg-red border-blue">Log in</button>
            </div>
        </nav>
    </header>
    <main class="flex flex-col gap-xl">