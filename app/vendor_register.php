<?php
    require('config.php');
    include($path.'/partials/header.php');
?>
<script src="./js/vendor_FormValidation.js"></script>
<h1 class="heading-center">Register</h1>
<div class="flex center">
    <a href="customer_register.php">
        <div class="bg-gray rad-left-md" style="padding: .75rem 1rem">
            <div class="">Customer</div>
        </div>
    </a>
    <a href="vendor_register.php">
        <div class="bg-blue text-white font-medium" style="padding: .75rem 1rem">
            <div class="test3">Vendor</div>
        </div>
    </a>
    <a href="shipper_register.php">
        <div class="bg-gray rad-right-md" style="padding: .75rem 1rem">
            <div class="test3">Shipper</div>
        </div>
    </a>
</div>
<div class="center">
    <form class="flex flex-col gap-md items-center" onsubmit="return vendor_validateForm()" method="post" action="" enctype="multipart/form-data">
        <div class="w-full">
            <input class=" w-full" type="file" name="avatar" id="avatar"></div>
        <div class="w-full">
            <label class="register-input" for="username">Username</label>
            <input class="register-input w-full" id="username" name="username" type="text">
        </div>
        <div class="w-full">
            <label class="register-input" for="password">Password</label>
            <input class="register-input w-full" id="password" name="password" type="text">
        </div>
        <div class="w-full">
            <label class="register-input" for="business_name">Business name</label>
            <input class="register-input w-full" id="business_name" name="business_name" type="text">
        </div>
        <div class="w-full">
            <label class="register-input" for="business_address">Business address</label>
            <input class="register-input w-full" id="business_address" name="business_address" type="text">
        </div>
        <div class="w-1/2">
            <input type="submit" name="login" class="w-full bg-red btn btn-md text-white font-medium">
        </div>
    </form>
</div>
<?php
    $myfile = fopen("db/accounts.db", "a");
    //Check password regex
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
            }return true;
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
    //functrion to validate business name
    function validate_name($business_name) {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            if(empty($business_name)) {
                return false;
            } else if (strlen("$business_name") <5) {
                return false;
        }return true; 
    }
    //funtion to validate business address
    function validate_address($business_address) {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            if(empty($business_address)) {
                return false;
            } else if (strlen("$business_address") <5) {
                return false;
        }return true;
    }
    //function to check if business name already exist
        function check_business_name($business_name){
            $file = fopen("db/accounts.db","r");
            $new=array();
            while (($data = fgetcsv($file)) !== FALSE) {
            if (preg_match("/^vendor$/",$data[0]) == true) {
                array_push($new,$data[3]);
            }

        }
            if (in_array($business_name,$new)) {
                echo "Business name is taken";
                return false;  
            } return true;
        }
    
    //function to check if business address already exist
        function check_business_address($business_address){
            $file2 = fopen("db/accounts.db","r");
            $new_add=array();
            while (($data2 = fgetcsv($file2)) !== FALSE) {
            if (preg_match("/^vendor$/",$data2[0]) == true) {
                array_push($new_add,$data2[4]);
            }
        }
            if (in_array($business_address,$new_add)) {
                echo "Business address is taken";
                return false;  
            } return true;
        }
    if (isset($_POST["login"])) {
        $file = $_FILES["avatar"]["tmp_name"];
        $ava_path = "avatar/".$_FILES["avatar"]["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $business_name = $_POST["business_name"];
        $business_address = $_POST["business_address"];
        if (validate_username($username) && validate_password($password) && validate_name($business_name) && validate_address($business_address) && check_username($username) && check_business_name($business_name) == true
        && check_business_address($business_address)) {
            $hashed_password = password_hash("$password",PASSWORD_DEFAULT); 
            $list = array (
            array("vendor", $username, $hashed_password,$business_name,$business_address, $ava_path)
            );
            foreach($list as $char) {
                fputcsv($myfile, $char);
                
            }
            move_uploaded_file($file, $path);
            echo "Register successfully";          
        } 
    }
?>
<?php
    include($path.'/partials/footer.php');
?>