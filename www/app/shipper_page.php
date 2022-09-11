<?php
include 'partials/header.php';
?>
<?php
//function find item by id
function find_item($prod) {
$prods=explode(",",$prod);
$arr=array();
foreach ($prods as $pr) {
    $item_file = read("db/lazada.db");
    $item_find = get_item("id",$pr,$item_file)[0];
    $item_name = $item_find->name;
    array_push($arr,$item_name);
}   $str=implode(",",$arr);
return $str;
}

$username = $_SESSION["u_name"];
$path2= "db/orders.db";
$path="db/accounts.db";
$file = read($path);
$curr_user1 = get_item("uname",$username,$file)[0];
$hub_name   = $curr_user1->b_address;
if ($hub_name == "My Dinh" ) {
    $path2= "db/orders.db";
    $file2= read($path2);
    $curr_user = get_item("hub_name","My Dinh",$file2)[0];
    $user = $curr_user->username;
    $hub_name1   = $curr_user->hub_name;
    $address = $curr_user->address;
    $prod = $curr_user->prods;
    $price = $curr_user->total_price;
    $prod_name=find_item($prod);
    $status = $curr_user->status;
    if ($hub_name1 == "My Dinh" && $status == "active") {
        echo"order from $user";?>
    <form action="" method="post">
        <input type="submit" name="show_detail" value="show detail">
    </form>
    <?php if (isset($_POST["show_detail"])) {
        echo"Products: $prod_name";
        echo "<br>";
        echo"Total price: $price" ;
        echo "<br>";
        echo"Address: $address";?>
    <div class="prod flex flex-col gap-md items-center">
        <form action="" method="post">
            <input type="radio" id="active" name="status" value="active" class="radio">
            <label for="status">Active</label>
            <input type="radio" id="delivered" name="status" value="delivered" class="radio">
            <label for="status">Delivered</label>
            <input type="radio" id="canceled" name="status" value="canceled" class="radio">
            <label for="status">Canceled</label>
            <input type="submit" name="chg_status" value="change status">
        </form>
    </div>
    <?php
       } if (isset($_POST["chg_status"])) {
        $stats=$_POST["status"];
        $output2 = fopen('db/tmp_orders.db', 'a');
        $input = fopen('db/orders.db', 'r');  //open for reading
        $output = fopen('db/tmp_orders.db', 'w'); //open for writing
        while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
            if ($user !== $data[0]) {
            fputcsv($output,$data);}
            if ($user== $data[0]) {
                $data[4]=$stats;
                print_r($stats);
                fputcsv($output2,$data);
                }}
                fclose( $input );
                fclose( $output );
                unlink('db/orders.db');// Delete obsolete BD
                rename('db/tmp_orders.db', 'db/orders.db'); //Rename temporary to new
                                
    }  }  }
else if ($hub_name == "Nguyen Trai") {
    $path2= "db/orders.db";
    $file2= read($path2);
    $curr_user = get_item("hub_name","Nguyen Trai",$file2)[0];
    $user = $curr_user->username;
    $hub_name1   = $curr_user->hub_name;
    $address = $curr_user->address;
    $prod = $curr_user->prods;
    $price = $curr_user->total_price;
    $prod_name=find_item($prod);
    $status = $curr_user->status;
    if ($hub_name1 == "Nguyen Trai" && $status == "active") {
        echo"order from $user";?>
    <form action="" method="post">
        <input type="submit" name="show_detail" value="show detail">
    </form>
    <?php if (isset($_POST["show_detail"])) {
        echo"Products: $prod_name";
        echo "<br>";
        echo"Total price:$price " ;
        echo "<br>";
        echo"Address: $address";
             ?>
        <form action="" method="post">
            <input type="radio" id="active" name="status" value="active" class="radio">
            <label for="status">Active</label>
            <input type="radio" id="delivered" name="status" value="delivered" class="radio">
            <label for="status">Delivered</label>
            <input type="radio" id="canceled" name="status" value="canceled" class="radio">
            <label for="status">Canceled</label>
            <input type="submit" name="chg_status" value="change status">
        </form>
    <?php
       } if (isset($_POST["chg_status"])) {
        $stats=$_POST["status"];
        $output2 = fopen('db/tmp_orders.db', 'a');
        $input = fopen('db/orders.db', 'r');  //open for reading
        $output = fopen('db/tmp_orders.db', 'w'); //open for writing
        while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
            if ($user !== $data[0]) {
            fputcsv($output,$data);}
            if ($user== $data[0]) {
                $data[4]=$stats;
                print_r($stats);
                fputcsv($output2,$data);
                }}
                fclose( $input );
                fclose( $output );
                unlink('db/orders.db');// Delete obsolete BD
                rename('db/tmp_orders.db', 'db/orders.db'); //Rename temporary to new
    }}
}   else if ($hub_name == "Hola") {
    $path2= "db/orders.db";
    $file2= read($path2);
    $curr_user = get_item("hub_name","Hola",$file2)[0];
    $user = $curr_user->username;
    $hub_name1   = $curr_user->hub_name;
    $address = $curr_user->address;
    $prod = $curr_user->prods;
    $price = $curr_user->total_price;
    $status = $curr_user->status;
    $prod_name=find_item($prod);
    if ($hub_name1 == "Hola" && $status == "active") {
        echo"order from $user";?>
    <form action="" method="post">
        <input type="submit" name="show_detail" value="show detail">
    </form>
    <?php if (isset($_POST["show_detail"])) {
        echo"Products: $prod_name";
        echo "<br>";
        echo"Total price: $price" ;
        echo "<br>";
        echo"Address: $address";
             ?>
        <form action="" method="post">
            <input type="radio" id="active" name="status" value="active" class="radio">
            <label for="status">Active</label>
            <input type="radio" id="delivered" name="status" value="delivered" class="radio">
            <label for="status">Delivered</label>
            <input type="radio" id="canceled" name="status" value="canceled" class="radio">
            <label for="status">Canceled</label>
            <input type="submit" name="chg_status" value="change status">
        </form>
    <?php
       } if (isset($_POST["chg_status"])) {
        $stats=$_POST["status"];
        $output2 = fopen('db/tmp_orders.db', 'a');
        $input = fopen('db/orders.db', 'r');  //open for reading
        $output = fopen('db/tmp_orders.db', 'w'); //open for writing
        while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
            if ($user !== $data[0]) {
            fputcsv($output,$data);}
            if ($user== $data[0]) {
                $data[4]=$stats;
                print_r($stats);
                fputcsv($output2,$data);
                }}
                fclose( $input );
                fclose( $output );
                unlink('db/orders.db');// Delete obsolete BD
                rename('db/tmp_orders.db', 'db/orders.db'); ?>
                <script src="./js/redirec.js"></script>
    
           <?php }}}

include 'partials/footer.php';
?>