<?php
    include 'partials/header.php';
?>
<h1 class="heading-center">Login</h1>
<div class="center">
    <label class="register-input" for="username">Username</label>
    <input class="register-input" id="username" type="text"><br>
    <label class="register-input" for="password">Password</label>
    <input class="register-input" id="password" type="text"><br>
</div>
<div class="center">
    <button class="btn btn-md rad-md text-white font-bold bg-red border-blue">login</button>
</div> 
<?php
    include 'partials/footer.php';
?>
    <form action="" method="post">
    Họ tên: <input type="text" name="fullname" value="">
    <button type="submit">Gửi</button>
</form>
<?php 
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
?>
