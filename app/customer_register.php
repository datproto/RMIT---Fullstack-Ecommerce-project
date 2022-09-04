<?php
    include 'partials/header.php';
?>
<h1 class="heading-center">Register</h1>
<div class="flex center gap-xs pad  ">
    <a href="customer_register.php">
        <div class="bg-blue"> 
            <div class="">Customer</div>
        </div>
    </a>
    <a href="vendor_register.php">
        <div class="bg-gray">
            <div class="test3">Vendor</div>
        </div>
    </a>
    <a href="shipper_register.php">
        <div class="bg-gray">
            <div class="test3">Shipper</div>
        </div>
    </a>
</div>
<div class="center">
    <form method="post" action="">
        <input type="file" accept=".jpg, .png">
        <label class="register-input" for="username">Username</label>
        <input class="register-input" id="username" type="text" name="username"><br>
        <label class="register-input" for="password" >Password</label>
        <input class="register-input" id="password" name="password" type="text"><br>
        <label class="register-input" for="name"> Name</label>
        <input class="register-input" id="name" name="name" type="text"><br>
        <label class="register-input" for="address">Address</label>
        <input class="register-input" id="address" name="address" type="text"><br>
        <input type="submit" class="bg-red btn">
        </form>
</div>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $myfile = fopen("accounts.db", "a");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($username)) {
            echo "Username is compulsory";
        } else {
            if (!preg_match("/^[a-zA-Z0-9]{8,15}$/",$username)) {
                echo "Invalid username";
            } 
        }
        if(empty($password)) {
            echo "Password is compulsory";
        } else {
            if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])(?=.*[A-Z])(?=.*[a-z])(?=.*[ !#$%&'\(\) * +,-.\/[\\] ^ _`{|}~\"])[0-9A-Za-z !#$%&'\(\) * +,-.\/[\\] ^ _`{|}~\"]{8,20}$/",$password)) {
                echo "invalid password";
            }
        }
        if(empty($name)) {
            echo "Name is compulsory";
        } else {
            if (!preg_match("/^[a-zA-Z]{5,}$/",$name)) {
                echo "invalid name";
            }
        }
        if(empty($address)) {
            echo "Address is compulsory";
        } else {
            if (!preg_match("/^[a-zA-Z]{5,}$/",$address)) {
                echo "invalid address";
            }
        }  
    }   
    $list = array (
    array("customer", $username, $password,$name,$address)
    );
    print_r($list);
    foreach($list as $char) {
        fputcsv($myfile, $char);
    }
?>
<?php
    include 'partials/footer.php';

