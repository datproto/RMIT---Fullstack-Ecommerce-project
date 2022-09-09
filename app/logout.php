<?php
session_start();
unset($_SESSION["login"]);
echo "You have been logged out";

die();