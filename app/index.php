<?php
    # Home Page

    include 'partials/header.php';

    $user_json = file_get_contents('user.db');
    $array = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $user_json), true);
//    $error = json_last_error();
//
//    var_dump($array, $error === JSON_ERROR_UTF8);

    foreach ($array as $a) {
        echo $a['username'];
    }
?>
<h1>Products</h1>
<div class="grid grid-col-3 gap-lg">
    <!--  Prod 1  -->
    <?php foreach ($array as $a) { ?>
    <div class="prod flex gap-md items-center">
        <img src="https://picsum.photos/300/300" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>
        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">
                <h4><?php echo $a['username'] ?></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold" onclick="addLocalStorage('prod', '<?php echo $a['username'] ?>')">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start">$350</div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!--  Prod 2  -->
    <div class="prod flex gap-md items-center">
        <img src="https://picsum.photos/300/300" alt="" class="rad-md" style="width: 8rem; height: 8rem"/>
        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">
                <h4>Fake Nike shoes</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start">$350</div>
            </div>
        </div>
    </div>


    <!--  Prod 3  -->
    <div class="prod flex gap-md items-center">
        <img src="https://picsum.photos/300/300" alt="" class="rad-md w-8xl"/>
        <div class="flex gap-md">
            <div class="flex flex-col gap-sm">
                <h4>Fake Nike shoes</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                <div class="flex gap-md">
                    <button class="btn btn-sm bg-red rad-xs text-white font-bold">Add to Cart</button>
                    <button class="btn btn-sm bg-none font-medium" style="padding-left: 0;"><i class="fa-regular fa-heart text-red"></i> Add to Wish</button>
                </div>
            </div>
            <div class="flex flex-col" style="height: 100%">
                <div class="price font-bold text-lg text-red" style="align-self: start">$350</div>
            </div>
        </div>
    </div>

</div>

<?php
    include 'partials/footer.php';
