<?php
session_start();
if(!isset($_SESSION["login"])){ 
    header("Location: login.php");
}
    # My Account page
    include 'partials/header.php';
    
?>
<?php
$username = $_SESSION["u_name"] ;
$file = fopen("db/accounts.db","r");
$myfile2 = fopen("db/my_accounts.db","r");
$myfile = fopen("db/my_accounts.db","w");
while (($data = fgetcsv($file)) !== FALSE) {
    if ($username == $data[1]) {
            fputcsv($myfile,$data); 
        }       
}
while (($data = fgetcsv($myfile2)) !== FALSE) {
    $b_name=$data[3];
    $pass=$data[2];
    $avatar=$data[4];
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="chg_ava">Change your avatar</label>
    <input type="file" name="chg_ava" id="chg_ava">
    <input type="submit" name="ava" class="bg-red btn">
</form>
<p>Role: shipper </p>
<p>username:<?php echo $username ?> </p>
<p>hub:<?php echo $b_name ?> </p>
<h1>My Account</h1>

<?php
$path = $avatar;
if (isset($_POST["ava"])) {
    $username = $_SESSION["u_name"] ;
    $file2 = $_FILES["chg_ava"]["tmp_name"];
    $path = "avatar/".$_FILES["chg_ava"]["name"];
    $myfile4 = fopen("db/my_accounts.db","r");
    move_uploaded_file($file2, $path);
    $file_contents=file_get_contents("db/my_accounts.db");
    $file_contents = str_replace($avatar,$path,$file_contents);

    file_put_contents("db/my_accounts.db",$file_contents);
while (($data = fgetcsv($file)) !== FALSE) {
    if ($username == $data[1]) {
            fputcsv($myfile,$data); 
        }       
}
while (($data = fgetcsv($myfile2)) !== FALSE) {
    $b_name=$data[3];
    $pass=$data[2];
    $avatar=$data[4];
}
}
?>
<img src="<?=$path?>" width="200" height="200" alt="avatar">
<form action="logout.php" method="post" onclick="document.location='login.php'" >
    <button type="button" id="logout" name="logout" value="logout" class="bg-red btn">  </button>
</form>
<?php
    include 'partials/footer.php';
?>