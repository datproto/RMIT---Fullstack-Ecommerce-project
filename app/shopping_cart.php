<?php
require('config.php');
include($path . '/partials/header.php');
?>

<!-- load localStorage JS into PHP array -->
<script>
    var json_upload = localStorage.getItem('buy_prod');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "shop_addToCart.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
</script>

<?php
$cart_items_array = [];
if (isset($_SESSION['buy_prod'])) {
    $cart_items_array = object_to_array($_SESSION['buy_prod']);
}

$displayed_cart_items = [];
foreach ($cart_items_array as $item) {
    $displayed_cart_items[] = get_item('id', $item['prod'], $products_array)[0];
}
?>

<div class="flex flex-col lg:flex-row gap-md">
    <div class="flex-1 flex flex-col gap-md rad-sm" style="padding: 1rem; border: 1px solid gray">
        <!-- Product -->
        <?php foreach ($displayed_cart_items as $key=>$item) { ?>
            <div id="prod-<?php echo $key ?>" class="w-full flex items-center justify-between">
                <div class="information flex-1 flex items-center gap-md">
                    <img src="<?php echo $item->img ?>" alt="" class="w-8xl rad-md" style="object-fit: cover">
                    <div style="width: 15rem; max-width: 15rem; ellipsis; white-space: nowrap; overflow: hidden;"><?php echo $item->name ?></div>
                    <div>- <?php echo $item->price ?></div>
                </div>
                <div class="quantity">
                    <button class="bg-none text-red font-bold rad-sm" onclick="unsetCardProd(<?php echo $key ?>)">X</button>
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
<script>
function unsetCardProd(key) {
  let url = "shop_removeFromCart.php";
  let xhr = new XMLHttpRequest();
  xhr.open("POST", url);
  xhr.onreadystatechange = function() { if (xhr.readyState === 4 && xhr.status === 200) { console.log(xhr.responseText); } }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("remove_prod=" + encodeURIComponent(JSON.stringify(key)));
  window.location.reload();
}
</script>
<?php
include($path . '/partials/footer.php');
?>
