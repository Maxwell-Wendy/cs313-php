<?php
require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
   
     <form class="" action="updatedScriptures.php" method="post">
       Book: <input type="text" name="book" value=""><br>
       Chapter: <input type="text" name="chapter" value=""><br>
       Verse: <input type="text" name="verse" value=""><br>
       Content: <textarea name="content" rows="8" cols="80"></textarea><br>
       <?php
       foreach ($db->query('SELECT name FROM topic') as $row) {
        $name = $row['name'];
        echo  '<input type="checkbox" name="topic[]" value="$name">';
       }
        ?>
        <br>
       <input type="submit" name="" value="Push it NOW!!!">
     </form>
  </body>
</html>
