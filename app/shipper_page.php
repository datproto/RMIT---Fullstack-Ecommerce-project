<?php
session_start();
include 'common/crud.php';
?>
<?php
$username = $_SESSION["u_name"];
print_r($username);
$path="db/accounts.db";
$file = read($path);
$curr_user1 = get_item("uname",$username,$file)[0];
$hub_name      = $curr_user1->b_name;
if ($hub_name == "My Dinh") {
    echo"mydinh";
  } else if ($hub_name == "Nguyen Trai") {
    echo"NguyenTrai";
   } else 
    echo"Hola";

?>
