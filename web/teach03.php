<!DOCTYPE html>
<html>
<body>

<form action="name.php" method="post">
Name: <input type="text" name="name"><br>
Email: <input type="text" name="email"><br>
Major: <br> 
<input type="radio" name="major" value="Computer Science">Computer Science<br>
<input type="radio" name="major" value="Web Design and Development">Web Design and Development<br>
<input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br>
<input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>
Comments: <textarea name="comment" rows="5" cols="40"></textarea>

Continents Visited: <br>
<input type="checkbox" name="continent[]" value="north america">North America<br>
<input type="checkbox" name="continent[]" value="south america">South America<br>
<input type="checkbox" name="continent[]" value="europe">Europe<br>
<input type="checkbox" name="continent[]" value="australia">Australia<br>
<input type="checkbox" name="continent[]" value="asia">Asia<br>
<input type="checkbox" name="continent[]" value="africa">Africa<br>
<input type="checkbox" name="continent[]" value="antartica">Antartica<br>

<input type="submit">
</form>

</body>
</html>
