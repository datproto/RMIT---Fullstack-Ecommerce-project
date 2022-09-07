<?php
    include 'partials/header.php';
?>
<script src="./js/customer_FormValidation.js"></script>
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
    <form onsubmit = "return customer_validateForm()" method="post" action="">
        <input type="file" accept=".jpg, .png">
        <label class="register-input" for="username">Username</label>
        <input class="register-input" id="username" type="text" name="username"><br>
        <label class="register-input" for="password" >Password</label>
        <input class="register-input" id="password" name="password" type="text"><br>
        <label class="register-input" for="name"> Name</label>
        <input class="register-input" id="name" name="name" type="text"><br>
        <label class="register-input" for="address">Address</label>
        <input class="register-input" id="address" name="address" type="text"><br>
        <input type="submit" name="login" class="bg-red btn">
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
    $myfile = fopen("accounts.db", "a");
    //check if username is taken    
    function check_username($username) {
        $file=fopen("accounts.db","r");
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
    //functrion to validate name
    function validate_name($name) {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            if(empty($name)) {
                return false;
            } else if (strlen("$name") <5) {
                return false;
        }return true; 
    }
    //funtion to validate address
    function validate_address($address) {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            if(empty($address)) {
                return false;
            } else if (strlen("$address") <5) {
                return false;
        }return true;
    } 
if (isset($_POST['login'])) {   
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    if (validate_username($username) == true && validate_password($password) == true && validate_name($name) == true && validate_address($address) == true && check_username($username) == true) {
        $hashed_password = password_hash("$password",PASSWORD_DEFAULT);
        $list = array (
        array("customer", $username, $hashed_password,$name,$address)
        );
        foreach($list as $char) {
            fputcsv($myfile, $char);
        } 
        echo "Register successfully";     
    } 
}        
?>
<?php
    include 'partials/footer.php';

