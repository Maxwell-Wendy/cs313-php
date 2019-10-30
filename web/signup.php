<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up Here</title>
  </head>
  <body>
  <h1>Sign up for a new account here</h1>
    <form class="" action="create_account.php" method="POST">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Password</label><br>
        <input type="password" name="password-1" value="Enter Password"><br>
        <label>Re-enter Password</label><br>
        <input type="password" name="password_2" value="Re-enter Password"><br>
        <input type="submit" name="" value="Create Account"><br>
    </form>
    
  </body>
  </html>