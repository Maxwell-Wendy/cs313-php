<!DOCTYPE html>
<html>
<body>

<form action="name.php" method="post">
Name: <input type="text" name="name"><br>
Email: <input type="text" name="email"><br>
Major: <br> 
<!-- <input type="radio" name="major" value="Computer Science">Computer Science<br>
<input type="radio" name="major" value="Web Design and Development">Web Design and Development<br>
<input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br>
<input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>  -->
<?php
    $majors = array("CS" => "Computer Science", 
                    "WEB" => "Web Engineering",
                    "CIT" => "Computer Information Techonolgy",
                    "CE" => "Computer Engineering",
                    "SE" => "Software Engineering");
    foreach ($majors as $x => $x_value) {
        echo "<input type='radio' name='major' value='".$x_value."'>".$x_value."<br>";
    }
?>
Comments: <textarea name="comment" rows="5" cols="40"></textarea><br>

Continents Visited: <br>
<input type="checkbox" name="continent[]" id="na" value="North America">North America<br>
<input type="checkbox" name="continent[]" id="sa" value="South America">South America<br>
<input type="checkbox" name="continent[]" id="eu" value="Europe">Europe<br>
<input type="checkbox" name="continent[]" id="aus" value="Australia">Australia<br>
<input type="checkbox" name="continent[]" id="asia" value="Asia">Asia<br>
<input type="checkbox" name="continent[]" id="afr" value="Africa">Africa<br>
<input type="checkbox" name="continent[]" id="ant" value="Antartica">Antartica<br>

<input type="submit">
</form>

</body>
</html>
