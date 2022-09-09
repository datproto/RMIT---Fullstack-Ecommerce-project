<?php
    require('config.php');
    include($path.'/partials/header.php');
?>
<script src="./js/shipper_FormValidation.js"></script>
<h1 class="heading-center">Register</h1>
<div class="flex center">
    <a href="customer_register.php">
        <div class="bg-gray rad-left-md" style="padding: .75rem 1rem">
            <div class="">Customer</div>
        </div>
    </a>
    <a href="vendor_register.php">
        <div class="bg-gray" style="padding: .75rem 1rem">
            <div class="test3">Vendor</div>
        </div>
    </a>
    <a href="shipper_register.php">
        <div class="bg-blue text-white font-medium rad-right-md" style="padding: .75rem 1rem">
            <div class="test3">Shipper</div>
        </div>
    </a>
</div>
<div class="center">
    <form class="flex flex-col gap-md items-center" onsubmit="return customer_validateForm()" method="post" action="" enctype="multipart/form-data">
        <div class="w-full">
            <input class="w-full" type="file" name="avatar" id="avatar">
        </div>
        <div class="w-full">
            <label class="register-input" for="username" value>Username</label>
            <input class="register-input w-full" id="username" name="username" type="text">
        </div>
        <div class="w-full">
            <label class="register-input" for="password">Password</label>
            <input class="register-input w-full" id="password" name="password" type="text">
        </div>
        <div class="w-full">
            <label for="distribution-hub">Choose a distribution hub</label>
            <select class="register-input w-full" name="distribution-hub" id="distribution-hub">
                <option value="hub1">hub 1</option>
                <option value="hub2">hub 2</option>
                <option value="hub3">hub 3</option>
            </select>
        </div>
        <div class="w-full">
            <input type="submit" name="login" class="w-full bg-red btn btn-md text-white font-medium">
        </div>
    </form>
</div>
<?php
    function passwordIsValid( $pass) {
        if (!preg_match('/[a-z]+/', $pass)) {
            return false;
        } else if (!preg_match('/[A-Z]+/', $pass)) {
            return false;
        } else if (!preg_match('/[0-9]+/', $pass)) {
            return false;
        } else if (!preg_match('/[!@#$%\^&*]+/', $pass)) {
            return false;
        }return true;
    }

?>
<?php
    $myfile = fopen("db/accounts.db", "a");
    //check if username is taken    
    function check_username($username) {
        $file=fopen("db/accounts.db","r");
        $new=array();
        while (($data = fgetcsv($file)) !== FALSE) {
            array_push($new,$data[1]);   
    }
        if (in_array($username,$new)) {
            echo "Username is taken";
            return false;  
        } return true;
    }
    //function to validate username
    function validate_username($uname) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($uname)) {
                return false;
            } else if (!preg_match("/^[a-zA-Z0-9]{8,15}$/",$uname)) {
                return false;
            } else if (strlen("$uname") <8) {
                return false;
            } else if (strlen("$uname") >15) {
                return false;
        } return true;
        }  
    }
    //function to validate password
    function validate_password($password) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($password)) {
                return false;
            } else if (passwordIsValid($password) !== true) {
                return false;                
            } else if (strlen("$password") <8) {
                return false;
            } else if (strlen("$password") >20) {
                return false;
            }
        }return true;   
    }
    if (isset($_POST['login'])) {  
        $file = $_FILES["avatar"]["tmp_name"];
        $path = "avatar/".$_FILES["avatar"]["name"]; 
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hub = $_POST["distribution-hub"];
        if (validate_username($username) == true && validate_password($password) == true && check_username($username) == true) {
            $hashed_password = password_hash("$password",PASSWORD_DEFAULT);
            $list = array (
            array("shipper", $username, $hashed_password,$hub,$path)
            );
            foreach($list as $char) {
                fputcsv($myfile, $char);
            } move_uploaded_file($file, $path);  
            echo "Register successfully";     
        } 
    }      
?>
<?php
    include($path.'/partials/footer.php');
?>
  