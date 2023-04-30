<?php
session_start();

// initializing variables
$username = "";
$role = "";
$errors = array();

$selectedRole = "";
$selectedName = "";
$selectedUName = "";

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '202117752', 'registration-system');
  
?>