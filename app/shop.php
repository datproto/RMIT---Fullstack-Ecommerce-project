<?php
require('config.php');
include($path . '/partials/header.php');
?>

<h1>Products</h1>
<div class="grid grid-col-3 gap-lg">
    <?php for ($i = 0; $i <= count($products_array); $i++) { ?>
        <div class="w-full flex gap-md items-center" style="border: 1px solid black">
            <img src="<?php echo $products_array[$i]->img ?>" alt="" class="rad-md w-10xl" style="object-fit: cover" />
            <div class="flex-1 flex justify-between items-center">
                <div class="flex flex-col gap-sm">
                    <h4><?php echo $products_array[$i]->short ?></h4>
                    <p class="descriptionText"><?php echo $products_array[$i]->short ?></p>
                    <div class="flex gap-md">
                        <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart('<?php echo $products_array[$i]->id ?>')">Add to Cart</button>
                        <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="font-bold text-lg text-red" style="align-self: center"><?php echo $products_array[$i]->price ?></div>
                    <button class="detailsButton btn btn-md" onclick="navigateToProduct(<?php echo $products_array[$i]->id ?>)">Details..</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include($path . '/partials/footer.php');
?>
