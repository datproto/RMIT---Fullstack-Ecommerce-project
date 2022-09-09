<?php
include 'common/crud.php';

$logged = isset($_SESSION["login"]);

$role = '';
$pass = '';
$b_name = '';
$b_address = '';
$avatar = '';

if ($logged) {
    $username = $_SESSION["u_name"] ;
    $users = read('db/accounts.db');
    $curr_user = get_item('uname',$username,json_decode($users))[0];

    $role       = $curr_user->role;
    $pass       = $curr_user->pass;
    $b_name     = $curr_user->b_name;
    $b_address  = $curr_user->b_address;
    $avatar     = $curr_user->avatar;
} else {
    header("Location: ");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RMIT - Ecommerce</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/pages/products.css">
    <script src="https://kit.fontawesome.com/25adc7f9b5.js" crossorigin="anonymous"></script>
    <script src="../js/addLocalStorage.js"></script>
    <script src="../js/removeLocalStorage.js"></script>
</head>
<body>
<header>
    <nav class="flex justify-between items-center">
        <div class="left flex items-center gap-xl">
            <div id="logo">
                <a href="/">
                    <img src="" alt="" />
                </a>
            </div>
            <?php
            if($logged) {
                ?>
                <ul>
                    <?php if ($role === 'customer') { ?>
                        <li>
                            <a href="../shop.php">Products</a>
                        </li>
                    <?php } elseif ($role === 'vendor') { ?>
                        <li>
                            <a href="../vendor_products.php">My Products</a>
                        </li>
                    <?php } elseif ($role === 'shipper') { ?>
                        <li>
                            <a href="../shipper_orders.php">My Orders</a>
                        </li>
                    <?php } ?>
                </ul>
                <?php
            }
            ?>
        </div>
        <div class="right-menu flex gap-xl">
            <?php
            if($logged) {
                ?>
                <ul class="flex items-center gap-xl">
                    <li>
                        <?php if ($role === 'customer') { ?>
                            <a href="../shopping_cart.php">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
                <a href="my_account.php" class="flex items-center">
                    <img src="<?php echo $avatar ?>" alt="" class="w-3xl rad-full" />
                </a>
                <?php
            } else {
                ?>
                <a href="../customer_register.php" class="btn btn-md flex items-center rad-md text-white font-bold bg-blue border-blue">Register</a>
                <a href="../index.php" class="btn btn-md flex items-center rad-md text-white font-bold bg-red border-blue">Log in</a>
                <?php
            }
            ?>
        </div>
    </nav>
</header>
<main class="flex flex-col gap-xl">