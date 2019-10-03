<?php 

echo $_POST["name"]; 
echo "<br>";

$mail = $_POST["email"];

echo "<a href=\"mailto:".$mail."\">Email Address</a>";
echo "<br>";
echo $_POST["major"];
echo "<br>";
echo $_POST["comment"];
echo "<br>";
echo "Your continents are: <br>";
$continents = $_POST["continent"];
foreach ($continents as $x => $x_value) {
    echo $x_value." <br>";
}

?>