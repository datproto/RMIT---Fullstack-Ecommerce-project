<?php
    require('config.php');
    include($path.'/partials/header.php');

    function check_if_username_exist($login_name,$login_pass): bool
    {
        $users      = read("db/accounts.db");

        $curr_user = get_item('uname',$login_name,json_decode($users))[0];
        if ($curr_user) {
            $password   = $curr_user->pass;
            $role       = $curr_user->role;
            

            if(password_verify($login_pass,$password)) {
                if ($role == "vendor") {
                    $_SESSION["role"]="vendor";
                }
                elseif($role == "customer") {
                    $_SESSION["role"]="customer";
                    //go to customer page
                }
                else {
                    $_SESSION["role"]="customer";
                    //go to shipper page
                }
            } else {
                echo 'Wrong password!';
                return false;
            }
        } else {
            echo 'Cannot find user!';
            return false;
        }
        return true;
    }

    if (isset($_GET['submit'])) {
        $login_name=$_GET["login_name"];
        $login_pass=$_GET["login_pass"];
        if(check_if_username_exist($login_name, $login_pass)) {
            $_SESSION["u_name"] = $login_name;
            $_SESSION["logged"] = true;
        } else {
            echo "Login failed";
        }
    }
?>
<h1 class="heading-center">Login</h1>
<div class="center w-full md:w-1/2 lg:w-1/3">
    <form method="get" action="my_account.php" class="flex flex-col items-center gap-md w-full">
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



    

