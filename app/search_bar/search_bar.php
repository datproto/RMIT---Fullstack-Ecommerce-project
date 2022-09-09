<?php
session_start();
include 'app/partials/header.php';
$product_json = read('db/lazada.db');
$msg = $_POST['search_bar'];
$prods = get_item('id', $msg ,json_decode($product_json))[0];
echo $msg;
?>
    <div class="flex gap-lg">
        <div class="prod flex flex-col gap-md items-center">
            <div>
                <form method="post">
                    <input type="text" name="search_bar" id="search_bar" placeholder="Search for a product here..."><br>
                    <label for="search_bar"></label>
                </form>
            </div>
            <div class="w-full flex flex-col md:flex-row gap-md">
                <img src="<?php echo $prods -> img ?>" alt="" class="rad-md w-full md:w-1/3 lg:w-1/4" style="object-fit: cover"/>
                <div class="flex flex-col gap-md" style="flex: 1">
                    <div class="flex flex-col gap-sm">
                        <h4><?php echo $prods -> name ?></h4>
                        <p class="md:hidden"><?php echo $prods -> description ?></p>
                        <div class="flex gap-md">
                            <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addToCart(uid = 1, prod_id = <?php echo $prods -> id ?>)">Add to Cart</button>
                            <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                        </div>
                    </div>
                    <div class="flex flex-col" style="height: 100%">
                        <div class="price font-bold text-lg text-red" style="align-self: start"><?php echo $prods -> price ?></div>
                    </div>
                </div>
            </div>
            <!-- Description on tablet and desktop -->
            <div class="hidden md:block">
                <h4>Description</h4>
                <p><?php echo $prods -> description ?></p>
            </div>
        </div>
    </div>

    <script>
        function addToCart(uid = 1, prod_id) {
            console.log(prod_id)
            addLocalStorage("buy_prod", {user: uid, prod: prod_id}, 'array', 'append')
        }
    </script>
<?php
include 'app/partials/footer.php';
?>