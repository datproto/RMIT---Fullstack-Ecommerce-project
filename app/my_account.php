<?php
    session_start();
    # My Account page
    include 'partials/header.php';
?>

<?php
if (isset($_SESSION["u_name"])){
    echo"exist";
} else echo "die";
    $username = $_SESSION["u_name"];
    $file = fopen("db/accounts.db","r");
    $account_read = fopen("db/my_accounts.db","r");
    $account_w = fopen("db/my_accounts.db","w");
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($username == $data[1]) {
            fputcsv($account_w,$data);
        }
    }
?>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2 flex flex-col gap-md rad-md" style="padding: 3rem; border: 1px solid var(--gray)">
            <h1>My Account</h1>

            <div id="content" class="flex flex-col lg:flex-row gap-md">
                <img src="<?= $avatar ?>" width="200" height="200" alt="avatar">
                <div class="information flex flex-col gap-md">
                    <?php
                    if (isset($_POST["ava"])) {
                        $file2 = $_FILES["chg_ava"]["tmp_name"];
                        $path = "avatar/".$_FILES["chg_ava"]["name"];
                        $account_w4 = fopen("db/my_accounts.db","r");
                        move_uploaded_file($file2, $path);
                        $file_contents= file_get_contents("db/accounts.db");
                        $file_contents = str_replace($avatar,$path,$file_contents);
                        file_put_contents("db/accounts.db",$file_contents);

                        while (($data = fgetcsv($file)) !== FALSE) {
                            if ($username == $data[1]) {
                                fputcsv($account_w,$data);
                            }
                        }
                    }
                    ?>
                    <form class="flex flex-col gap-md" action="" method="post" enctype="multipart/form-data">
                        <div class="w-full flex flex-col items-start gap-sm">
                            <label class="font-medium text-red" for="chg_ava">Change your avatar</label>
                            <div class="flex">
                                <input type="file" name="chg_ava" id="chg_ava">
                                <input type="submit" name="ava" class="bg-red btn text-white">
                            </div>
                        </div>
                    </form>

                    <div class="flex gap-sm">
                        <p class="font-medium text-red">Role: </p>
                        <p><?php echo $role ?> </p>
                    </div>
                    <div class="flex gap-sm">
                        <p class="font-medium text-red">Username: </p>
                        <p><?php echo $username ?> </p>
                    </div>
                    <?php if ($role === 'vendor') {?>
                    <div class="flex gap-sm">
                        <p class="font-medium text-red">Business Name: </p>
                        <p><?php echo $b_name ?> </p>
                    </div>
                    <div class="flex gap-sm">
                        <p class="font-medium text-red">Business Address: </p>
                        <p><?php echo $b_address ?> </p>
                    </div>
                    <?php } ?>
                    <form action="logout.php" method="post" onclick="document.location='/'; return false" >
                        <button type="button" id="logout" name="logout" value="logout" class="bg-red btn btn-md text-white font-medium rad-sm"> Log out </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'partials/footer.php';
?>