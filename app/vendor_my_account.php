<?php
/*if(!isset($_SESSION["login"])){ 
    header("Location: login.php");
}
*/
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
<form action="" method="post" enctype="multipart/form-data">
    <label for="chg_ava">Change your avatar</label>
    <input type="file" name="chg_ava" id="chg_ava">
    <input type="submit" name="ava" class="bg-red btn">
</form>
<p>Role: Vendor </p>
<p>username:<?php echo $username ?> </p>
<p>business_name:<?php echo $b_name ?> </p>
<p>business address:<?php echo $b_address ?> </p>
<?php
if (isset($_POST["ava"])) {
    $username = $_SESSION["u_name"] ;
    $file2 = $_FILES["chg_ava"]["tmp_name"];
    $file = fopen("db/accounts.db","r");
    $path = "avatar/".$_FILES["chg_ava"]["name"];
    move_uploaded_file($file2, $path);
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($username == $data[1]) {    
                $data[5]=$path;
                print_r($path);
                print_r($data);
            }
    }
}$myfile = fopen("db/accounts.db","a");
fputcsv($myfile,$data);

    include 'partials/footer.php';
?>
