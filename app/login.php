<?php
    include 'partials/header.php';
?>
<h1 class="heading-center">Login</h1>
<div class="center">
    <form method="post" action="">
        <label class="register-input" for="login_name">Username</label>
        <input class="register-input" id="login_name" name="login_name" type="text"><br>
        <label class="register-input" for="login_pass">Password</label>
        <input class="register-input" id="login_pass" name="login_pass" type="text"><br>
        <input type="submit" class="bg-red btn">
    </form>
</div>
<?php
$login_name=$_POST["login_name"];
$login_pass=$_POST["login_pass"];
function check_if_username_exist($login_name,$login_pass) {
    $file = fopen("accounts.db","r");
    $username=array();
    $password=array();
    while (($data = fgetcsv($file)) !== FALSE) {
        array_push($username,$data[1]);
        array_push($password,$data[2]);
    }    
    if (in_array($login_name,$username)) {
        $user_pos = array_search($login_name,$username);
        if(password_verify($login_pass,$password[$user_pos])) {
            print_r("$login_pass");
            return true;
        }return false;
    }   
}
if(check_if_username_exist($login_name,$login_pass) == true) {
    echo "Login successfully";
} else echo "login failed";
    include 'partials/footer.php';
?>
    
<?php 






/*
$fullname=$_POST["fullname"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($fullname)) {
        echo "<span style='color:red;'>Error: Họ tên bắt buộc phải nhập.</span>";
    } else {
        if(!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
            echo "<span style='color:red;'>Error: Họ tên chỉ chấp nhận chữ và khoảng trắng.</span>";
        } else {
            echo $fullname;
        }
    }
}
*/
?>

