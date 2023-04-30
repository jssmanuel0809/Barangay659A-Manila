<?php include 'assets/script/protect.php'?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay Map</title>
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="assets/css/map.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<body>
     <!--nav bar-->
    <header>
        <a href="#" class="logo">BARANGAY 659</a>
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

    <div class="hero">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1930.5918504095534!2d120.98248982338714!3d14.588605914356512!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca219513dff1%3A0x4dff48b27ac9bd68!2s659%2C%20Ermita%2C%20Manila%2C%201000%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1681830356821!5m2!1sen!2sph" width="650" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</body>
</html>