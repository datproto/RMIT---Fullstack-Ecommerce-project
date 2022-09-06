<?php
    include 'partials/header.php';
?>
<script src="./js/shipper_FormValidation.js"></script>
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
    <form onsubmit = "return shipper_validateForm()" method="post" action="">
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
    if (isset($_POST['login'])) {   
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hub = $_POST["distribution-hub"];
        if (validate_username($username) == true && validate_password($password) == true && check_username($username) == true) {
            $hashed_password = password_hash("$password",PASSWORD_DEFAULT);
            $list = array (
            array("shipper", $username, $hashed_password,$hub,)
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
?>
  