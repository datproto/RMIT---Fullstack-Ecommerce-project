<?php
require('config.php');
include($path . '/partials/header.php');


function find_object_by_id($id, $array)
{
    if (isset($array[$id])) {
        return $array[$id];
    }

    return false;
}

$current_product = NULL;
if (isset($_COOKIE['product_id'])) {
    $current_product = find_object_by_id($_COOKIE['product_id'], $products_array);
}

?>

<div class="flex gap-lg">
    <div class="prod flex flex-col gap-md items-center">
        <div class="w-full flex flex-col md:flex-row gap-md">
            <img src="<?php echo $current_product->img ?>" alt="" class="rad-md w-full md:w-1/3 lg:w-1/4" style="object-fit: cover" />
            <div class="flex flex-col gap-md" style="flex: 1">
                <div class="flex flex-col gap-sm">
                    <h4><?php echo $current_product->name ?></h4>
                    <p class="md:hidden"><?php echo $current_product->description ?></p>
                    <div class="flex gap-md">
                        <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart(uid = 1, prod_id = <?php echo $current_product->id ?>)">Add to Cart</button>
                        <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                    </div>
                </div>
                <div class="flex flex-col" style="height: 100%">
                    <div class="price font-bold text-lg text-red" style="align-self: start"><?php echo $current_product->price ?></div>
                </div>
            </div>
        </div>
        <!-- Description on tablet and desktop -->
        <div class="hidden md:block">
            <h4>Description</h4>
            <p><?php echo $current_product->description ?></p>
        </div>
    </div>
</div>

<?php
include($path . '/partials/footer.php');
?>
