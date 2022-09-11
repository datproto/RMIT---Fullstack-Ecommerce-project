<?php
    # My Account page
    require('config.php');
    include($path.'/partials/header.php');
?>

<?php
    $username = $_SESSION["u_name"];
    $output = fopen('db/my_accounts.db', 'w');
?>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2 flex flex-col gap-md rad-md" style="padding: 3rem; border: 1px solid var(--gray)">
            <h1>My Account</h1>

            <div id="content" class="flex flex-col lg:flex-row gap-md">
                <img src="<?php
                    if ($avatar === '') {
                        echo 'https://i.pravatar.cc/500?img=15';
                    } else {
                        echo $avatar;
                    }
                ?>" width="200" height="200" alt="avatar">
                <div class="information flex flex-col gap-md">
                    <?php
                    if (isset($_POST["ava"])) {
                        $file = fopen("db/accounts.db","r");
                        $file2 = $_FILES["chg_ava"]["tmp_name"];
                        $path = "avatar/".$_FILES["chg_ava"]["name"];
                        move_uploaded_file($file2, $path);
                        $output2 = fopen('db/my_accounts.db', 'a');
                        $input = fopen('db/accounts.db', 'r');  //open for reading
                        $output = fopen('db/my_accounts.db', 'w'); //open for writing
                        while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
                            if ($username !== $data[1]) {
                                fputcsv($output,$data);}
                            if ($username == $data[1]) {
                                $data[5]=$path;
                                print_r($data[5]);
                                fputcsv($output2,$data);
                               }}
                                fclose( $input );
                                fclose( $output );
                                unlink('db/accounts.db');// Delete obsolete BD
                                rename('db/my_accounts.db', 'db/accounts.db'); //Rename temporary to new
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
                    <form action="logout.php" method="post" >
                        <input type="submit" id="logout" name="logout" value="Log out" class="bg-red btn btn-md text-white font-medium rad-sm"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include('partials/footer.php');
?>