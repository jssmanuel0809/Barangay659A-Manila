<?php include('../config/server.php');
include('../assets/script/protect.php');
include('../assets/script/captainpermissions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Users</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/users.css">   
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<body>
<?php
  if (isset($_POST['delete_user'])){
    $selectedRole = $_POST['userRole'];
    $selectedName = $_POST['userFName'];
    $selectedUName = $_POST['userUName'];

    $query = "DELETE FROM users WHERE username='$selectedUName' ";
    mysqli_query($db, $query);
  }
  ?>

    <div class="hero">
        <!--admin list-->
        <div class="user-container">
            <div class="user-header">
                <h1>Barangay Staff</h1>
            </div>
            <div class="user-content">
                <?php 
                $sql = "SELECT id, role, fullname, username FROM users";
                $result = mysqli_query($db, $sql);
                $row = mysqli_num_rows($result);

                if ($row > 0) {
                    while($data = mysqli_fetch_assoc($result)) {
                ?>

                <form action="deleteUser.php" method="post">
                    <fieldset class="users-info">
                        <input type="text" name="userRole" value="<?php echo $data['role']; ?>" readonly>
                        <input type="text" name="userFName" value="<?php echo $data['fullname']; ?>" readonly> 
                        <input type="text" name="userUName" value="<?php echo $data['username']; ?>" readonly>
                        <button class ="view-button" type="submit" value="Submit" name="delete_user">DELETE</button>
                    </fieldset>
                </form>
                    
                <?php
                }} else { ?>
                    <div class="users-alert">
                    <h3>No data found.</h3>
                    </div>
                <?php } ?>

            </div>
            <div class="user-functions">
                <a class="sAdmin-actions" href="users.php">Finish</a>
            </div>
        </div>
    </div>

</body>
</html>