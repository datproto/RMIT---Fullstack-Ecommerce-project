<?php
    include 'partials/header.php';
?>
<script src="./js/vendor_FormValidation.js"></script>
<h1 class="heading-center">Register</h1>
<div class="flex center gap-xs pad  ">
    <a href="customer_register.php">
        <div class="bg-gray"> 
            <div class="">Customer</div>
        </div>
    </a>
    <a href="vendor_register.php">
        <div class="bg-blue ">
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
    <form onsubmit = "return vendor_validateForm()" method="post" action="">
        <input type="file" name="avatar" id="avatar">
        <label class="register-input" for="username">Username</label>
        <input class="register-input" id="username" name="username" type="text"><br>
        <label class="register-input" for="password">Password</label>
        <input class="register-input" id="password" name="password" type="text"><br>
        <label class="register-input" for="business_name">Business name</label>
        <input class="register-input" id="business_name" name="business_name" type="text"><br>
        <label class="register-input" for="business_address">Business address</label>
        <input class="register-input" id="business_address" name="business_address" type="text"><br>
        <input type="submit" name="login" class="bg-red btn">
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
        $target_dir = "avatar/";
        $file = $_FILES["avatar"]["name'"];
	    $path = pathinfo($file);
	    $filename = $path["filename"];
	    $ext = $path["extension"];
	    $temp_name = $_FILES["avatar"]['tmp_name'];
	    $path_filename_ext = $target_dir.$filename.".".$ext;
        print_r($target_file);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $business_name = $_POST["business_name"];
        $business_address = $_POST["business_address"];
        if (validate_username($username) == true && validate_password($password) == true && validate_name($business_name) == true && validate_address($business_address) == true && check_username($username) == true && check_business_name($business_name) == true
        && check_business_address($business_address) == true) {
            $hashed_password = password_hash("$password",PASSWORD_DEFAULT); 
            $list = array (
            array("vendor", $username, $hashed_password,$business_name,$business_address)
            );
            foreach($list as $char) {
                fputcsv($myfile, $char);
            } move_uploaded_file($temp_name, $path_filename_ext);
            echo "Register successfully";          
        } 
    }
?>
<?php
    include 'partials/footer.php';
    $target_dir = "avatar/";
    $file = $_FILES["avatar"]["name'"];
    $path = pathinfo($file);
    $filename = $path["filename"];
    $ext = $path["extension"];
    $temp_name = $_FILES["avatar"]['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
    print_r($target_file);
    move_uploaded_file($temp_name, $path_filename_ext);
   