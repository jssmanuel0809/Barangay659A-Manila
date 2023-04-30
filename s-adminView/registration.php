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
    <title>Register User</title>
    <link rel="stylesheet" href="../assets/css/registration.css">
    <link rel="stylesheet" type="text/css" href="assets/css/global.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body class ="register-page" style="overflow: hidden;">
  <?php
    // REGISTER USER
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
            if(isset($_POST['role'])){   
                $newRole  = $_POST['role'];
                } else { 
                array_push($errors, "No role selected");
                } 

        
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $newUser = mysqli_real_escape_string($db, $_POST['username']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE username='$newUser' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $newUser) {
              array_push($errors, "Username already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1); //encrypt the password before saving in the database
            $query = "INSERT INTO users (role, fullname, username, password) 
                    VALUES('$newRole', '$fullname', '$newUser', '$password')";
            mysqli_query($db, $query);
            header('location: users.php');
        }
      } 
    ?>

    <!--Modal Type Window-->
    
    <div class="register-container">
        <form class="form-1" method="post" action="registration.php">
        <?php include('../assets/script/errors.php'); ?>
          <h1 class ="register-subheader">ADD USER</h1>

          <label for="radio" class = "position-label-hdr">POSITION</label>

          <div class = "radio-position">
            <label for="f-option" class="pstn-radio">
              <input type="radio" id="f-option" name="role" tabindex="1" value="superadmin">
              <span>Super Admin</span>
            </label>
            <label for="s-option" class="pstn-radio">
              <input type="radio" id="s-option" name="role" tabindex="2" value="admin">
              <span>Admin</span>
            </label>
              <label for="t-option" class="pstn-radio">
              <input type="radio" id="t-option" name="role" tabindex="3" value="user">
              <span>User</span>
            </label>

          </div>

          <label for="text" class = "main-label"> Full Name: </label>
          <input type="text" name="fullname" id="text-name" required />
                    
          <label for="text" class = "main-label">Username:</label>
          <input type="text" name="username" id="username" required />

          <label for="password" class = "main-label" class="input-password"> Password: </label>
          <input type="password" name="password_1" id="password" class="input-password" required />
 
          <label for="password" class = "main-label" class="input-password">Confirm Password: </label>
          <input type="password" name="password_2" id="password" class="input-password" required />
            
          <button class ="main-button" type="submit" class="btn" name="reg_user">Confirm</button>
    
        </form>
    </div>
  </body>
</html>