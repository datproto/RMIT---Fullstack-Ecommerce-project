<?php
require('config.php');
include($path . '/partials/header.php');
?>

<!-- load localStorage JS into PHP array -->
<script>
    var json_upload = localStorage.getItem('buy_prod');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "shopping_cart.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(json_upload);
</script>

<?php
$cart_items_array = object_to_array(json_decode($_SESSION['products'], true))['values'];

$displayed_cart_items = [];
foreach ($cart_items_array as $item) {
    $displayed_cart_items[] = get_item('id', $item['prod'], $products_array)[0];
}
?>

<div class="flex flex-col lg:flex-row gap-md">
    <div class="flex-1 flex flex-col gap-md rad-sm" style="padding: 1rem; border: 1px solid gray">
        <!-- Product -->
        <?php foreach ($displayed_cart_items as $item) { ?>
            <div id="prod-<?php echo $item->id ?>" class="w-full flex items-center justify-between">
                <div class="information flex-1 flex items-center gap-md">
                    <img src="<?php echo $item->img ?>" alt="" class="w-8xl rad-md" style="object-fit: cover">
                    <div style="width: 10rem; max-width: 10rem; ellipsis; white-space: nowrap; overflow: hidden;"><?php echo $item->name ?></div>
                    <div>- <?php echo $item->price ?></div>
                </div>
                <div class="quantity">
                    <button class="bg-none text-red font-bold rad-sm">X</button>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="w-full flex flex-col gap-md rad-sm md:w-1/6" style="padding: 1rem; border: 1px solid gray; height: fit-content">
        <h4>Shipping Details</h4>
        <div class="flex justify-between gap-sm">
            <p>Total price</p>
            <p class="font-medium text-red">500000</p>
        </div>
        <div class="flex justify-between gap-sm">
            <p>Address</p>
            <p class="font-medium text-red">RMIT University</p>
        </div>
        <button class="btn btn-md bg-red text-white font-bold rad-sm">Check out</button>
    </div>
</div>

<?php
include($path . '/partials/footer.php');
?>
