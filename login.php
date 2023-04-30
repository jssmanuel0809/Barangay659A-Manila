<?php include('config/server.php')?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&family=Montserrat:wght@400;700&family=Open+Sans:wght@800&family=Poppins&family=Quicksand&family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/global.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body class ="login-page">
    <?php if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $data['username'];
          $_SESSION['role'] = $data['role'];
          $_SESSION["logged_in"] = true;
          //$_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }?>

    <!--Modal Type Window-->
    
    <div class="login-container">
        <form class="form-1" method="post" action="login.php">
        <?php include('assets/script/errors.php'); ?>
          <h1 class ="main-header"> BARANGAY 659 </h1>
          <h1 class ="main-subheader"> PROFILING SYSTEM </h1>
          <h1 class ="main-login-subheader">LOGIN</h1>
          <label for="name" class = "main-label">Username:</label>
          <input type="text" name="username" id="username" required />
          <label for="password" class = "main-label">Password: </label>
          <input type="password" name="password" id="password" required />
          
          <button class ="main-button" type="submit" class="btn" name="login_user">Log In</button>
        </form>
    </div>
  </body>
</html>