<?php
session_start();
include 'common/crud.php';
?>
<?php
$username = $_SESSION["u_name"];
$file2= read("db/orders.db");
$path="db/accounts.db";
$file = read($path);
$curr_user1 = get_item("uname",$username,$file)[0];
$hub_name   = $curr_user1->b_address;
if ($hub_name == "My Dinh") {
    $file2= read("db/orders.db");
    $curr_user = get_item("hub_name","My Dinh",$file2)[0];
    $user = $curr_user->username;
    $hub_name1   = $curr_user->hub_name;
    $address = $curr_user->address;
    $prod = $curr_user->prods;
    $status = $curr_user->status;
    if ($hub_name1 == "My Dinh") {
        echo"order from $user";?>
    <form action="" method="post">
        <input type="submit" name="show_detail" value="show detail">
    </form>
    <?php if (isset($_POST["show_detail"])) {
        echo"Products: $prod";
        echo "<br>";
        echo"Total price: " ;
        echo "<br>";
        echo"Address: $address";
             }
    }
}else if ($hub_name == "Nguyen Trai") {
    $file2= read("db/orders.db");
    $curr_user = get_item("hub_name","Nguyen Trai",$file2)[0];
    $user = $curr_user->username;
    $hub_name1   = $curr_user->hub_name;
    $address = $curr_user->address;
    $prod = $curr_user->prods;
    $status = $curr_user->status;
    if ($hub_name1 == "Nguyen Trai") {
        echo"order from $user";?>
    <form action="" method="post">
        <input type="submit" name="show_detail" value="show detail">
    </form>
    <?php if (isset($_POST["show_detail"])) {
        echo"Products: $prod";
        echo "<br>";
        echo"Total price: " ;
        echo "<br>";
        echo"Address: $address";
    }}
}else if ($hub_name == "Hola") {
    $file2= read("db/orders.db");
    $curr_user = get_item("hub_name","Hola",$file2)[0];
    $user = $curr_user->username;
    print_r($curr_user);
    $hub_name1   = $curr_user->hub_name;
    $address = $curr_user->address;
    $prod = $curr_user->prods;
    $status = $curr_user->status;
    if ($hub_name1 == "Hola") {
       echo"order from $user";?>
    <form action="" method="post">
       <input type="submit" name="show_detail" value="show detail">
    </form>
    <?php }if (isset($_POST["show_detail"])) {
       echo"Products: $prod";
       echo "<br>";
       echo"Total price: " ;
       echo "<br>";
       echo"Address: $address";
    }
}
?>
