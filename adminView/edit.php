<?php include('../assets/script/protect.php');
include('../assets/script/userpermissions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/profiles.css">   
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<body>
    <!--nav bar start-->
    <header>
            <a class="logo">BARANGAY 659-A</a>
            <ul class="navlist">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../profile.php">Profiles</a></li>
                <li><a href="../adminView/edit.php">Update</a></li>
                <!-- <li><a href="map.php">Map</a></li> -->
                <li><a href="../s-adminView/users.php">Users</a></li>
                <li><a href="../assets/script/logout.php"><?php echo $_SESSION['username'];?></a></li>
                <!-- <li><p class="role-nav"><?php //echo $_SESSION['role'];?></p></li> -->
            </ul>
            <div class="bx bx-menu" id="menu-icon"></div>
        </header>
 <!--search and filter div-->
    <div class="hero">
        <div class="nav">
            <div class="search">
                <h4>Search for:</h4>
                <input type="text" placeholder="Search..">
            </div>
            <div class="sort">
                <h4>Sort by:</h4>
                <form>
                    <select name="sort" id="sort">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    </select>
                </form>
                </div>
            </div>

            <!--profile list-->
            <div class="profile">
                <h1>Edit Profiles</h1>
                <button class="add-profile">Add New Profile</button>
            </div>
            <div class="profile-list">
                <div class="profiles">
                    <img class="icon" src="icon.JPG">
                    <h3>Name of Resident</h3>
                    <button class="view">EDIT</button>
                </div>
                <div class="profiles">
                    <img class="icon" src="icon.JPG">
                    <h3>Name of Resident</h3>
                    <button class="view">EDIT</button>
                </div>
                <div class="profiles">
                    <img class="icon" src="icon.JPG">
                    <h3>Name of Resident</h3>
                    <button class="view">EDIT</button>
            </div>
        </div>

    <!---js link-->
    <script src="homepage.js"></script>

</body>
</html>