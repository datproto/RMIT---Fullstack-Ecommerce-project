<form action="" method="post">
    <input type="file" name="avatar">
    <input type="submit" name="login" class="bg-red btn">
</form>

<?php
if (isset($_POST["login"])) {
    $target_dir = "avatar/";
    $file = $_FILES["avatar"]["name'"];
    $path = pathinfo($file);
    $filename = $path["filename"];
    $ext = $path["extension"];
    $temp_name = $_FILES["avatar"]["tmp_name"];
    $path_filename_ext = $target_dir.$filename.".".$ext;
    print_r($path_filename_ext);
    print_r($temp_name);
    move_uploaded_file($temp_name, $path_filename_ext);
}