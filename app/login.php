<?php
    session_start();
    include 'partials/header.php';
?>
<h1 class="heading-center">Login</h1>
<div class="center">
    <form method="post" action="">
        <label class="register-input" for="login_name">Username</label>
        <input class="register-input" id="login_name" name="login_name" type="text"><br>
        <label class="register-input" for="login_pass">Password</label>
        <input class="register-input" id="login_pass" name="login_pass" type="text"><br>
        <input type="submit" name="login" class="bg-red btn">
    </form>
</div>
<?php
    // Cmt 1: Các Function nên để trên cùng
    function check_if_username_exist($login_name,$login_pass) {
        $file = fopen("db/accounts.db","r");
        $username=array();
        $password=array();
        $role=array();
        while (($data = fgetcsv($file)) !== FALSE) {
            $username[] = $data[1];
            $password[] = $data[2];
            $role[] = $data[0]; 
        if (in_array($login_name,$username)) {
            $user_pos = array_search($login_name,$username);
            if(password_verify($login_pass,$password[$user_pos])) {
                if (preg_match("/^vendor$/",$role[$user_pos]) == true) {
                    echo $role[$user_pos];
                    //go to vendor page
                }
                elseif(preg_match("/^customer$/",$role[$user_pos]) == true) {
                    echo $role[$user_pos];
                    //go to customer page
                }
                else {
                    echo "shipper";
                    //go to shipper page
                }  
                return true;
            }return false;  
        }
    
        }}

    // Cmt 2: Phải xử lý kiểm tra xem có nhận được action submit không, không thì sẽ bị trả lời do backend không nhận được data
    if (isset($_POST['login'])) {
        $login_name=$_POST["login_name"];
        $login_pass=$_POST["login_pass"];
        if(check_if_username_exist($login_name, $login_pass)) {
            $_SESSION["u_name"]=$login_name;
            $_SESSION["login"]="on";
            echo "Login successfully";
        } else {
            echo "Login failed"; // Cmt 3: Hạn chế viết code short-hand hoặc one line nếu chưa nắm rõ logic code (Code này đã sửa)
        }
    }

    include 'partials/footer.php';


?>



    

