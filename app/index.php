<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'partials/header.php';
    ?>
    <link rel="stylesheet" href="styles/pages/products.css">
</head>
<body>
    <div>
        <h1>Products</h1>
        <button class="btn btn-md" onclick="navigateTo('product/add.php')">Add new</button>
    </div>
<div class="productList grid grid-col-3 gap-lg">
    <?php foreach ($products_array as $a) { ?>
        <div class="productItem flex gap-md items-center">
            <div class="productItemDescription">
                <img 
                    src="<?php echo empty($a['img'])? '' : $a['img']; ?>"
                    alt="" 
                    class="rad-md" 
                    style="width: 8rem; height: 8rem"
                />
                <div class="flex flex-col gap-sm description">
                    <h4><?php echo empty($a['short'])? '' : $a['short']; ?></h4>
                    <p class="descriptionText"><?php echo empty($a['description'])? '' : $a['description']; ?></p>
                    <div class="flex gap-md">
                        <a href="#" class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart('<?php echo $a['id'] ?>')">Add to Cart</a>
                        <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center" style="height: 100%">
                <div class="font-bold text-lg text-red" style="align-self: center"><?php echo empty($a['price'])? '' : $a['price']; ?> $</div>
                <button class="detailsButton btn btn-md" onclick="navigateToProduct(<?php echo $a['id'] ?>)">Details..</button>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include 'partials/footer.php';
?>
</body>
</html>


<script>
    function addToCart(id) {
        alert(id)
    }
</script>
