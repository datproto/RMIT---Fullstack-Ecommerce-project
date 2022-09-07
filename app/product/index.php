<?php
    include '../partials/header.php';

    $product_json = file_get_contents('../db/product.db');
    $array = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $product_json), true);
?>
<h1>Products</h1>
<div class="grid grid-col-3 gap-lg">
    <?php foreach ($array as $a) { ?>
    <div class="prod flex gap-md items-center" onclick="navigateToProduct(<?php $a['id'] ?>)">
      <!-- TODO: add image src via db -->
        <img src="<?php echo $a['image'] ?>" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>
        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">
                <h4><?php echo $a['name'] ?></h4>
                <p><?php echo $a['description'] ?></p>
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start"><?php echo $a['price'] ?></div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
    include '../partials/footer.php';
?>

<script>
    function navigateToProduct(id) {
        document.getElementById(id).style.visibility='visible';
    }
</script>
