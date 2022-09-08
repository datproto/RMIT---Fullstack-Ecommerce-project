<?php
    include '../partials/header.php';

    $prods_json = file_get_contents('../db/product.db');
    $prods_arr = json_decode(($prods_json), true);
?>
<div class="w-full">
    <?php
        foreach ($prods_arr as $prod):
            if ($prod['id'] == $_GET['id']) {
    ?>
    <div class="prod flex flex-col gap-md items-center">
      <!-- TODO: add image src via db -->
        <img src="<?php echo $prod['img'] ?>" alt="" class="rad-md w-full"/>
        <div class="flex flex-col gap-md">
            <div class="flex flex-col gap-sm">
                <h4><?php echo $prod['short'] ?></h4>
                <p><?php echo $prod['description'] ?></p>
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start"><?php echo $prod['price'] ?></div>
            </div>
        </div>
    </div>
    <?php
            }
        endforeach;
    ?>
</div>

<?php
    include '../partials/footer.php';
?>

<script>
    function navigateToProduct(id) {
        document.getElementById(id).style.visibility='visible';
    }
</script>
