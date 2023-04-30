<?php

session_start();

session_destroy();
unset($_SESSION['username']);
unset($_SESSION['role']);
$_SESSION["logged_in"] = false;
header("location: http://127.0.0.1/barangay659a/index.php");

?>