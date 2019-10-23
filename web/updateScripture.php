<?php
require "dbConnect.php";
$db = connect_db();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    echo "Hello";
    /*foreach ($db->query('SELECT book, chapter, verse, content FROM public.scripture') as $row)
    {
      echo 'Book: <b>' . $row['book'] . "</b>";
      echo '<br/>';
      echo 'Chapter: <b>' . $row['chapter'] . "</b>";
      echo '<br/>';
      echo 'Verse: <b>' . $row['verse'] . "</b>";
      echo '<br/>';
      echo 'Content: <b>' . $row['content'] . "</b>";
      echo '<br/><hr>';
    }*/
     ?>
     <form class="" action="updatedScriptures.php" method="post">
       Book: <input type="text" name="book" value=""><br>
       Chapter: <input type="text" name="chapter" value=""><br>
       Verse: <input type="text" name="verse" value=""><br>
       Content: <textarea name="content" rows="8" cols="80"></textarea><br>
       <?php
       foreach ($db->query('SELECT name FROM public.topic') as $row)
       {
        echo  '<input type="checkbox" name="topic[]" value="' . $row['name'] .'">';
       }
        ?>
        <br>
       <input type="submit" name="" value="Push it NOW!!!">
     </form>
  </body>
</html>
