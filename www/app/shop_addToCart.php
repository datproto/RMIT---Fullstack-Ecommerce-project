<?php
session_start();
print_r(json_decode($_POST['buy_prod'], true));
$_SESSION["buy_prod"][] = json_decode($_POST['buy_prod'], true);