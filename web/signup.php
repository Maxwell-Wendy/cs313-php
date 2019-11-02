<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();

    if (isset($_SESSION['pwd_error'])) {
      $error_msg = $_SESSION['pwd_error'];
      $err_star = " *";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="book.css">
    <title>Sign Up Here</title>
  </head>
  <body>
  <h1>Sign up for a new account here</h1>
  <div>
    <form class="" action="create_account.php" method="POST">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username"><span style="color:red;"><?php echo $err_star; ?></span><br><br>
        <label>Password (must contain at least 7 characters and at least 1 number)</label><br>
        <input type="password" name="password_1" placeholder="Password"><span style="color:red;"><?php echo $err_star; ?></span><br><br>
        <label>Re-enter Password</label><br>
        <input type="password" name="password_2" placeholder="Password"><span style="color:red;"><?php echo $err_star; ?></span><br>
        <input type="submit" name="submit_pwd" value="Create Account"><br>
        <span style="color:red;"><?php echo $error_msg; ?></span><br>
    </form>
    <br>

    <a href="signin.php">Return to Sign In Page</a>
  </div>
    
  </body>
  </html>