<?php
    require('config.php');
    include($path.'/partials/header.php');

    function check_if_username_exist($login_name,$login_pass) {
        $file = fopen("db/accounts.db","r");
        $username=array();
        $password=array();
        while (($data = fgetcsv($file)) !== FALSE) {
            array_push($username,$data[1]);
            array_push($password,$data[2]);
            arra
        }    
        if (in_array($login_name,$username)) {
            $user_pos = array_search($login_name,$username);
            if(password_verify($login_pass,$password[$user_pos])) {
                print_r("$login_pass");
                return true;
            }return false;
        }   
    }
    if (isset($_GET['submit'])) {
        $login_name=$_GET["login_name"];
        $login_pass=$_GET["login_pass"];
        if(check_if_username_exist($login_name, $login_pass) == true) {
            $_SESSION["u_name"] = $login_name;
            $_SESSION["logged"] = true;
            ?>
            <script src="./js/redirect.js"></script>       
        <?php       
        } else {
            echo "Login failed";
        }
    }
?>
<h1 class="heading-center">Login</h1>
<div class="center w-full md:w-1/2 lg:w-1/3">
    <form method="get" action="" class="flex flex-col items-center gap-md w-full">
        <div class="w-full flex items-center gap-sm">
            <label class="register-input w-10xl font-medium text-red" for="login_name">Username:</label>
            <input class="register-input w-full" id="login_name" name="login_name" type="text" style="flex: 1"/>
        </div>
        <div class="w-full flex items-center gap-sm">
            <label class="register-input w-10xl font-medium text-red" for="login_pass">Password:</label>
            <input class="register-input" id="login_pass" name="login_pass" type="password" style="flex: 1"/>
        </div>
        <input type="submit" name="submit" class="w-full bg-red btn btn-lg text-white font-medium">
    </form>
</div>
<?php

    include($path.'/partials/footer.php');
?>





