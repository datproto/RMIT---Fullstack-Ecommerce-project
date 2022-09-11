<?php
session_start();
unset($_SESSION['buy_prod'][$_POST['remove_prod']]);
$_SESSION['buy_prod'] = [...$_SESSION['buy_prod']];
