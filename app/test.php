<form action="" method="post">
   <input type="file" name="test">
   <input type="submit" name="submit" id="submit">
</form>

<?php
if (isset($_POST["submit"])) {
$file=$_POST["test"];
print_r($file);
if (empty($_POST[$file])) {
   echo"not";
} else echo"okay";}
