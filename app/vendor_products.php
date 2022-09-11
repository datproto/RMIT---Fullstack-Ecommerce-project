<?php
include 'partials/header.php';

$vendor_products_array = [];

foreach ($products_array as $product) {
    if ($product->vendor == $username && $role == 'vendor') {
        $vendor_products_array[] = $product;
    }
}
?>

<div class="flex gap-xl">
    <div>
        <h1>All of my products</h1>
        <div>
            <input id="filterProductBox" type="text" placeholder="Filter product" class="rad-none rad-left-md" onkeyup="filterProduct()" />
            <button class="btn btn-md"><a href="vendor_add_products.php">Add Products</a></button>
        </div>
    </div>
</div>
<div class="productList grid grid-col-3 gap-lg">
    <?php for ($i = 0; $i < count($vendor_products_array); $i++) { ?>
        <?php if ($vendor_products_array[$i]) { ?>
            <div class="product w-full flex gap-md items-center" style="border: 1px solid black">
                <img src="<?php echo $vendor_products_array[$i]->img ?>" alt="" class="rad-md w-10xl" style="object-fit: cover" />
                <div class="flex-1 flex justify-between items-center">
                    <div class="flex flex-col gap-sm">
                        <h4><?php echo $vendor_products_array[$i]->short ? $vendor_products_array[$i]->short : '' ?></h4>
                        <p class="descriptionText"><?php echo $vendor_products_array[$i]->short ?></p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="font-bold text-lg text-red" style="align-self: center"><?php echo $vendor_products_array[$i]->price ?></div>
                        <a class="detailsButton btn btn-md" href="<?php echo 'prod_detail.php?id='.$vendor_products_array[$i]->id ?>">Details..</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<script>
    //TODO: convert this into util ?
    const filterProduct = () => {
        let input, filter, ul, li, a, i;
        input = document.getElementById("filterProductBox");
        filter = input.value.toUpperCase();
        productList = document.querySelector(".productList");
        allProducts = productList.querySelectorAll(".product");
        for (i = 0; i < allProducts.length; i++) {
            txtValue = allProducts[i].textContent || allProducts[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                allProducts[i].style.display = "";
            } else {
                allProducts[i].style.display = "none";
            }
        }
    }
</script>

<?php
include 'partials/footer.php';
?>
