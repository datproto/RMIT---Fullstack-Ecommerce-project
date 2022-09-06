<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Add products</title>
    <script src="js/addProduct.js"></script>
</head>
<body>
<header>
    <?php
    include 'partials/header.php';
    ?>
</header>

<div class="flex gap-lg">

    <div class="font-bold">
        <p>Add new product</p>
    </div>

</div>

<div class="flex gap-lg">
    <div>
        <form id="add_products" action="vendor_products.php">
            <label for="product_pic">Choose a picture for your product: </label><br>
            <input type="file" id="product_pic" name="product_pic" accept="image/png, image/jpeg" required><br>
            <label for="product_name">Name </label><br>
            <input type="text" id="product_name" name="product_name" required class="form-control"><br>
            <label for="product_price">Price </label><br>
            <input type="text" id="product_price" name="product_price" required><br>
            <label for="product_desc"> Description (Optional) </label><br>
            <input type="text" id="product_desc" name="product_desc"><br><br>
            <input type="submit" value="Add" onclick="addProduct()">
        </form>
    </div>


</div>





<footer>
    <?php
    include 'partials/footer.php';
    ?>
</footer>
</body>
</html>