<?php
    include 'partials/header.php';
?>
<h1 class="heading-center">Register</h1>
<div class="flex center gap-xs pad  ">
    <a href="customer_register.php">
        <div class="bg-gray"> 
            <div class="">Customer</div>
        </div>
    </a>
    <a href="vendor_register.php">
        <div class="bg-gray ">
            <div class="test3">Vendor</div>
        </div>
    </a>
    <a href="shipper_register.php">
        <div class="bg-blue">
            <div class="test3">Shipper</div>
        </div>
    </a>
</div>
<div class="center">
    <form method="post" action="">
        <input type="file" accept=".jpg, .png">
        <label class="register-input" for="username" value>Username</label> 
        <input class="register-input" id="username" name="username" type="text"><br>
        <label class="register-input" for="password">Password</label>
        <input class="register-input" id="password" name="password" type="text"><br>
        <label for="distribution-hub">Choose a distribution hub</label>
        <select class="register-input" name="distribution-hub" id="distribution-hub">
            <option value="hub1">hub 1</option>
            <option value="hub2">hub 2</option>
            <option value="hub3">hub 3</option>
        </select><br>
        <input type="submit" class="bg-red btn">
    </form>
</div>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hub = $_POST["distribution-hub"];
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
    }  
      
    $list = array (
    array("shipper", $username, $password,$hub,)
    );
    print_r($list);
    foreach($list as $char) {
        fputcsv($myfile, $char);
    }
?>
<?php
    include 'partials/footer.php';
