<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
include_once ($path.'/common/crud.php');
create_update($_POST['checkout'], $path.'/db/orders.db');