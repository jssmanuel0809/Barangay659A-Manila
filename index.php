<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay 659A Manila</title>
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<body>
<!--nav bar-->
<header>
        <a class="logo">BARANGAY 659-A</a>
        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profiles</a></li>
            <li><a href="adminView/edit.php">Update</a></li>
            <!-- <li><a href="map.php">Map</a></li> -->
            <li><a href="s-adminView/users.php">Users</a></li>
            <li><a href="assets/script/logout.php"><?php echo $_SESSION['username'];?></a></li>
            <!-- <li><p class="role-nav"><?php //echo $_SESSION['role'];?></p></li> -->
        </ul>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>
    
    <section class="hero">
        <div class="hero-text">
            <h4>Barangay 659 | Zone 71 | District V Manila</h4>
            <h1>PROFILES</h1>
            <p>Some baranggay information here. Some baranggay information here. Some baranggay information here. Some baranggay information here.</p>
            <a href="profile.php" class="ctaa"><i class="ri-play-fill"></i>See Profiles</a>
        </div>

</body>
</html>
 