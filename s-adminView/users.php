<?php include('../config/server.php');
include('../assets/script/protect.php');
include('../assets/script/captainpermissions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay Staff</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/users.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<body>
     <!--nav bar start-->
    <header>
        <a href="#" class="logo">BARANGAY 659-A</a>
        <ul class="navlist">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../profile.php">Profiles</a></li>
            <li><a href="../adminView/edit.php">Update</a></li>
            <!-- <li><a href="map.php">Map</a></li> -->
            <li><a href="s-adminView/users.php">Users</a></li>
            <li><a href="../assets/script/logout.php"><?php echo $_SESSION['username'];?></a></li>
            <!-- <li><p class="role-nav"><?php //echo $_SESSION['role'];?></p></li> -->
        </ul>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>
    <!--search and filter div-->
    <div class="hero">
        <!--admin list-->
        <div class="user-container">
            <div class="user-header">
                <h1>Barangay Staff</h1>
            </div>

            <!-- START FOR LOOP -->
            <div class="user-content">
                <?php 
                $sql = "SELECT id, role, fullname, username FROM users";
                $result = mysqli_query($db, $sql);
                $row = mysqli_num_rows($result);

                if ($row > 0) {
                    while($data = mysqli_fetch_assoc($result)) {
                ?>

                <form action="changeUser.php" method="post">
                    <fieldset class="users-info">
                        <input type="text" name="userRole" value="<?php echo $data['role']; ?>" readonly>
                        <input type="text" name="userFName" value="<?php echo $data['fullname']; ?>" readonly> 
                        <input type="text" name="userUName" value="<?php echo $data['username']; ?>" readonly>
                        <button class ="view-button" type="submit" value="Submit" name="get_user" href="changeUser.php">EDIT</button>
                    </fieldset>
                </form>
                    
                <?php
                }} else { ?>
                    <div class="users-alert">
                    <h3>No data found.</h3>
                    </div>
                <?php } ?>
            </div>
            <!-- END FOR LOOP -->

            <div class="user-functions">
                <a class="sAdmin-actions" href="registration.php">Add New User</a>
                <a class="sAdmin-actions" href="deleteUser.php">Delete User</a>
            </div>
        </div>
    </div>

</body>
</html>