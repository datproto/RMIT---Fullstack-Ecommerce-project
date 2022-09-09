<?php
include 'partials/header.php';

$product_json = file_get_contents('db/product.db');
$products_array = json_decode(($product_json), true);
?>

<div class="flex flex-col lg:flex-row gap-md">
    <div class="flex-1 flex flex-col gap-md rad-sm" style="padding: 1rem; border: 1px solid gray">
        <!-- Product -->
        <?php foreach($products_array as $p){ ?>
        <div id="prod-<?php echo $p['id'] ?>" class="w-full flex items-center justify-between">
            <div class="information flex-1 flex items-center gap-md">
                <img src="<?php echo $p['img'] ?>" alt="" class="w-8xl rad-md" style="object-fit: cover">
                <div style="width: 10rem; max-width: 10rem; ellipsis; white-space: nowrap; overflow: hidden;"><?php echo $p['name'] ?></div>
                <div>- <?php echo $p['price']?></div>
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
include 'partials/footer.php';