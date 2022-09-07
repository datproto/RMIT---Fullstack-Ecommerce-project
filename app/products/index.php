<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include '../partials/header.php';

        $product_json = file_get_contents('../db/product.db');
        $products_array = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $product_json), true);
    ?>
    <link rel="stylesheet" href="products.css"> 
</head>
<body>
    <h1>Products</h1>
    <div class="productList grid grid-col-3 gap-lg">
        <?php foreach ($products_array as $a) { ?>
            <div class="productItem flex gap-md items-center">
                <div>
                    <img src="<?php echo $a['image'] ?>" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>
                </div>
                <div class="flex gap-md items-center">
                    <div class="flex flex-col gap-sm">
                        <h4><?php echo $a['name'] ?></h4>
                        <p class="descriptionText"><?php echo $a['description'] ?></p>
                        <div class="flex gap-md">
                            <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                            <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                        </div>
                    </div>
                    <div class="flex flex-col items-center" style="height: 100%">
                        <div class="font-bold text-lg text-red" style="align-self: center"><?php echo $a['price'] ?> $</div>
                        <button class="detailsButton btn btn-md" onclick="navigateToProduct(<?php echo $a['id'] ?>)">Details..</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
   
    <?php
        include '../partials/footer.php';
    ?>
</body>
</html>


<script>
    function navigateToProduct(id) {
        sessionStorage.setItem('product_id', id);
        window.location=`../product/index.php`;
    }
</script>
