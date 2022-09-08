<?php
    include '../partials/header.php';

    function findObjectById($id, $array){
        if ( isset( $array[$id] ) ) {
            return $array[$id];
        }

        return false;
    }
?>

<?php 
    $current_product = NULL;
    if(isset($_COOKIE['product_id'])) {
        $current_product = findObjectById($_COOKIE['product_id'], $products_array);
    }
?>

<div class="w-full">
    <div class="prod flex flex-col gap-md items-center">
        <div>
            <img 
                src="<?php echo $current_product['img'] ?>" 
                alt="" 
                class="rad-md" 
                style="width: 8rem; height: 8rem"
            />
        </div>
        <h1><?php echo empty($current_product['name'])? '' : $current_product['name']; ?></h1>
        <p><?php echo empty($current_product['price'])? '' : $current_product['price']; ?></p>
        <p><?php echo empty($current_product['description'])? '' : $current_product['description']; ?></p>
        <p><?php echo empty($current_product['vendor'])? '' : $current_product['vendor']; ?></p>

        <div class="flex gap-md">
            <a href="#" class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart('<?php echo $a['id'] ?>')">Add to Cart</a>
            <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
        </div>
    </div>
</div>

<?php
    include '../partials/footer.php';
?>
