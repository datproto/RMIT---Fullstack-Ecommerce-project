<?php
session_start();
include('partials/header.php');
//$username = $_SESSION["u_name"] ;
$users = read('db/accounts.db');
$curr_user = get_item('uname',"vinhduaws",json_decode($users))[0];
print_r($curr_user);
$role       = $curr_user->role;
$pass       = $curr_user->pass;
$b_name     = $curr_user->b_name;
$b_address  = $curr_user->b_address;
$avatar     = $curr_user->avatar;
print_r($role);
