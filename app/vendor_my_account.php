<?php
if(!isset($_SESSION["login"])){ 
    header("Location: login.php");
}
    session_start();
    # My Account page
    include 'partials/header.php';
?>

<h1>My Account</h1>
<?php
$username = $_SESSION["u_name"] ;
$file = fopen("db/accounts.db","r");
while (($data = fgetcsv($file)) !== FALSE) {
    if ($username == $data[1]) {
            $b_name=$data[3];
            $b_address=$data[4];
            $avatar=$data[5];
    }
}
?>
<img src="<?=$avatar?>" width="200" height="200" class="avatar" alt="avatar">
<p>Role: Vendor </p>
<p>username:<?php echo $username ?> </p>
<p>business_name:<?php echo $b_name ?> </p>
<p>business address:<?php echo $b_address ?> </p>
<?php
    include 'partials/footer.php';
?>
