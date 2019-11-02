<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();
    if(isset($_SESSION['is_bad_login'])) {
      $badLogin = $_SESSION['is_bad_login'];
    }
    else {
      $badLogin = false;
    }
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="book.css">
    <title>Sign In Here</title>
  </head>
  <body>
      <?php

      if($badLogin) {
        echo "Incorrect username or password.<br>";
      }
      ?>

  <h1>Sign In to Your Book Catalogue Account</h1>
  <div>
    <form class="" action="check_login.php" method="POST">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username"><br><br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" name="" value="Sign In"><br>
    </form>
    <br>
    <p>Or <a href="signup.php">Sign up for a new account.</a></p>
  </div>

  </body>
  </html>