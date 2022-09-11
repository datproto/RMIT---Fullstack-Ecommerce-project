<?php
require('config.php');
include($path . '/partials/header.php');
?>

<div>
    <h1>Products</h1>
    <div>
        <input id="filterProductBox" type="text" placeholder="Filter product" class="rad-none rad-left-md" onkeyup="filterProduct()" />
    </div>
</div>
<div class="productList grid grid-col-3 gap-lg">
    <?php for ($i = 0; $i < count($products_array); $i++) { ?>
        <div class="product w-full flex gap-md items-center border">
            <img src="<?php echo $products_array[$i]->img ?>" alt="" class="rad-md w-10xl object-cover" />
            <div class="flex-1 flex justify-between items-center">
                <div class="flex flex-col gap-sm">
                    <h4><?php echo $products_array[$i]->short ?></h4>
                    <p class="descriptionText"><?php echo $products_array[$i]->short ?></p>
                    <div class="flex gap-md">
                        <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart(prod_id=<?php echo $products_array[$i]->id ?>)">Add to Cart</button>
                        <button class="btn btn-sm bg-none font-medium"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="font-bold text-lg text-red self-center"><?php echo $products_array[$i]->price ?></div>
                    <a class="detailsButton btn btn-md" href="<?php echo 'prod_detail.php?id='.$products_array[$i]->id ?>">Details..</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    const filterProduct = () => {
        let input, filter, ul, li, a, i;
        input = document.getElementById("filterProductBox");
        filter = input.value.toUpperCase();
        let productList = document.querySelector(".productList");
        let allProducts = productList.querySelectorAll(".product");
        for (i = 0; i < allProducts.length; i++) {
            let txtValue = allProducts[i].textContent || allProducts[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                allProducts[i].style.display = "";
            } else {
                allProducts[i].style.display = "none";
            }
        }
    }
</script>

<?php
include($path . '/partials/footer.php');
?>
