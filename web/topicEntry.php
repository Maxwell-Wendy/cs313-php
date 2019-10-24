<?php
require "dbConnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Topic Entry</title>
  </head>
  <body>
    <a href="assignments.php">Back to Assignments Page</a>
    <h1>Enter New Scriptures and Topics</h1>
   
     <form class="" action="insertTopic.php" method="post">
       Book: <input type="text" name="book" value=""><br>
       Chapter: <input type="text" name="chapter" value=""><br>
       Verse: <input type="text" name="verse" value=""><br>
       Content: <textarea name="content" rows="8" cols="80"></textarea><br>
       Topics: <br>
       <?php
       foreach ($db->query('SELECT id, name FROM topic') as $row) {
        $id = $row['id'];
        $name = $row['name'];
        echo "<input type='checkbox' name='topics[]' id='topics$id' value='$id'>";
        echo "<label for='topics$id'>$name</label><br/>";
        echo "\n";
       }

       $topic = $_POST['']

        echo "<input type='checkbox' name='topics[]'' id='new_topic'>";
        echo "<input type='text' name='new_topic' placeholder='Enter your own topic here'>"

        ?>

        <input type="checkbox" name="topics[]" id="new_topic" placeholder="Enter your own topic here">
        <input type="text" name="new_topic">
        <br>

       <input type="submit" value="Push it NOW!!!">
     </form>
  </body>
</html>
