<?php 

echo $_POST["name"]; 
echo "<br>";

$mail = $_POST["email"];

echo "<a href=\"mailto:".$mail."\">Email Address</a>";

echo $_POST["major"];

echo $_POST["comment"];

?>