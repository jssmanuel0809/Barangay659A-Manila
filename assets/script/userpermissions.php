<?php
session_start();
//checking if the session exists
//if the session is not set it redirects the user to the login form/page

  if($_SESSION["role"] == 'user'){
      header("location: http://127.0.0.1/barangay659a/permissionerror.php");
  } 
?>