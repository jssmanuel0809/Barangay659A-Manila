<?php include('../config/server.php');
include('../assets/script/protect.php');
include('../assets/script/captainpermissions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&family=Montserrat:wght@400;700&family=Open+Sans:wght@800&family=Poppins&family=Quicksand&family=Roboto+Mono&display=swap" rel="stylesheet">
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/css/changeUser.css">
    <link rel="stylesheet" type="text/css" href="assets/css/global.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body class ="user-page" style="overflow: hidden;">
  <?php
  if (isset($_POST['get_user'])){
    $selectedRole = $_POST['userRole'];
    $selectedName = $_POST['userFName'];
    $selectedUName = $_POST['userUName'];
  }
  if (isset($_POST['edit_user'])){
    // receive all input values from the form
    if(isset($_POST['role'])){   
      $newRole  = $_POST['role'];
      } else { 
        array_push($errors, "No role selected");
      } 

    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $newUName = mysqli_real_escape_string($db, $_POST['new_username']);
    $old_password = mysqli_real_escape_string($db, $_POST['old_password']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $verification_query = "SELECT * FROM users WHERE username='$newUName'";
    $verified = mysqli_query($db, $verification_query);
    $userlist = mysqli_fetch_assoc($verified);

    $user_check_query = "SELECT * FROM users WHERE fullname='$fullname'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($userlist){
      if ($newUName !== $user['username']) {
        array_push($errors, "Username already exists");
      }
    }

    $password = md5($old_password);
    if ($user) { // if user exists
      if ($user['password'] !== $password) {
        array_push($errors, "Current password does not match.");
      }
      if ($password_1 !== $password_2) {
        array_push($errors, "The two passwords do not match");
      }
    }


    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $new_password = md5($password_1); //encrypt the password before saving in the database
        $query = "UPDATE users SET role='$newRole', username='$newUName', password='$new_password' WHERE fullname='$fullname'";
        mysqli_query($db, $query);
        header('location: users.php');
    }
  }
  ?>

    <!--Modal Type Window-->
    
    <div class="user-container">
        <form class="form-1" method="post" action="changeUser.php">
        <?php include('../assets/script/errors.php'); ?>
          <h1 class ="user-subheader">EDIT USER</h1>

          <label for="radio" class = "position-label-hdr">POSITION</label>

          <div class = "radio-position">
            <label for="f-option" class="pstn-radio">
              <input type="radio" id="f-option" name="role" tabindex="1" value="superadmin" <?php if($selectedRole == "superadmin"){ echo "checked='checked'";}  ?>>
              <span>Super Admin</span>
            </label>
            <label for="s-option" class="pstn-radio">
              <input type="radio" id="s-option" name="role" tabindex="2" value="admin" <?php if($selectedRole == "admin"){ echo "checked='checked'";}  ?>>
              <span>Admin</span>
            </label>
              <label for="t-option" class="pstn-radio">
              <input type="radio" id="t-option" name="role" tabindex="3" value="user" <?php if($selectedRole == "user"){ echo "checked='checked'";}  ?>>
              <span>User</span>
            </label>

          </div>

          <label for="text" class = "main-label"> Full Name: </label>
          <input type="text" name="fullname" id="text-name" value="<?php echo $selectedName; ?>" readonly/>
                    
          <label for="text" class = "main-label">Username:</label>
          <input type="text" name="new_username" id="username" value="<?php echo $selectedUName; ?>" />

          <label for="password" class = "main-label" class="input-password"> Current Password: </label>
          <input type="password" name="old_password" id="password" class="input-password" required />

          <label for="password" class = "main-label" class="input-password"> New Password: </label>
          <input type="password" name="password_1" id="password" class="input-password" required />
 
          <label for="password" class = "main-label" class="input-password">Confirm Password: </label>
          <input type="password" name="password_2" id="password" class="input-password" required />
            
          <button class ="main-button" type="submit" class="btn" name="edit_user">Save</button>
    
        </form>
    </div>
  </body>
</html>

