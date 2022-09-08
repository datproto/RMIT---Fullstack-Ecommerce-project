<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Products List</title>
    <script src="js/addLocalStorage.js"></script>
</head>
<body>
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






<footer>
<?php
include 'partials/footer.php';
?>
</footer>
</body>
</html>