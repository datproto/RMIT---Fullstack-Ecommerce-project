<?php
include 'partials/header.php';

$product_json = file_get_contents('db/product.db');
$products_array = json_decode(($product_json), true);
?>
<div class="grid grid-col-3 gap-lg">
    <h1>Products</h1>
    <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="navigateTo('product/add.php')">Add product</button>
</div>
<div class="grid grid-col-3 gap-lg">
    <?php foreach ($products_array as $a) { ?>
        <div class="w-full flex gap-md items-center" style="border: 1px solid black">
            <img src="<?php echo $a['img'] ?>" alt="" class="rad-md w-10xl" style="object-fit: cover"/>
            <div class="flex-1 flex justify-between items-center">
                <div class="flex flex-col gap-sm">
                    <h4><?php echo $a['short'] ?></h4>
                    <p class="descriptionText"><?php echo $a['description'] ?></p>
                    <div class="flex gap-md">
                        <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart('<?php echo $a['id'] ?>')">Add to Cart</button>
                        <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="font-bold text-lg text-red" style="align-self: center"><?php echo $a['price'] ?></div>
                    <a href="product/index.php?id=<?php echo $a['id'] ?>" class="detailsButton btn btn-md" onclick="navigateToProduct(<?php echo $a['id'] ?>)">Details..</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include 'partials/footer.php';
?>
