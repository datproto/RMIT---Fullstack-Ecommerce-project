<?php
include 'partials/header.php';
//include 'search_bar.php';
?>


<div class="flex gap-xl">
    <!-- My products -->
    <div class="first-element"><p>My Products</p></div>
    <!-- Add Products Button -->
    <div class="second-element">
        <button class="btn btn-md"><a href="vendor_addproducts.php">Add Products</a></button>
    </div>
<div id="display_div"></div>

    <script src="js/display_list.js"></script>

<?php
include 'partials/footer.php';
?>
