<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Products List</title>
    <script src="js/addProduct.js"></script>
</head>
<body onload="displayList()">
<header>
    <?php
    include 'partials/header.php';
    ?>
</header>


<div class="flex gap-xl">
    <!-- My products -->
    <div class="first-element"><p>My Products</p></div>
    <!-- Add Products Button -->
    <div class="second-element">
        <button class="btn btn-md"><a href="vendor_addproducts.php">Add Products</a></button>
    </div>
</div>

<div class="grid grid-col-3 gap-lg">
    <!--  Prod 1  -->
    <div class="prod flex gap-md items-center">
        <!--    Image    -->
        <img src="https://picsum.photos/300/300" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>

        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">

                <!-- Title -->
                <h4>Fake Nike shoes</h4>
                <!-- Description -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <!-- Buttons (Remove the ones which are not necessary -->
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start">$350</div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-col-3 gap-lg">
    <!--  Prod 1  -->
    <div class="prod flex gap-md items-center">
        <!--    Image    -->
        <img src="https://picsum.photos/300/300" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>

        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">

                <!-- Title -->
                <h4>Fake Nike shoes</h4>
                <!-- Description -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <!-- Buttons (Remove the ones which are not necessary -->
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start">$350</div>
            </div>
        </div>
    </div>
</div>


<div class="grid grid-col-3 gap-lg">
    <!--  Prod 1  -->
    <div class="prod flex gap-md items-center">
        <!--    Image    -->
        <img src="https://picsum.photos/300/300" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>

        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">

                <!-- Title -->
                <h4>Fake Nike shoes</h4>
                <!-- Description -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <!-- Buttons (Remove the ones which are not necessary -->
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start">$350</div>
            </div>
        </div>
    </div>
</div>


<footer>
<?php
include 'partials/footer.php';
?>
</footer>
</body>
</html>