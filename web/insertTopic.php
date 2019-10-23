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
    <?php
    if (isset ($_POST['book'])) {
      $b = htmlspecialchars($_POST['book']);
      $ch = htmlspecialchars($_POST['chapter']);
      $v = htmlspecialchars($_POST['verse']);
      $c = htmlspecialchars($_POST['content']);

      echo "$b $ch:$v $c <br>";
      $t = $_POST['topics'];
      echo $t[0];
      echo "<br>";
      $scriptureId = $db->lastInsertID("scriptures_id_seq");

        echo $scriptureID . "<br>";
      foreach ($t as $topicId) {
          echo "ScriptureId: $scriptureId, topicId: $topicId";
        }

      

      /*try {
        $stmt = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
        $stmt->bindValue(':book', $b, PDO::PARAM_STR);
        $stmt->bindValue(':chapter', $ch, PDO::PARAM_INT);
        $stmt->bindValue(':verse', $v, PDO::PARAM_INT);
        $stmt->bindValue(':content', $c, PDO::PARAM_STR);
        $stmt->execute();

        $scriptureId = $db->lastInsertID("scriptures_id_seq");

        echo $scriptureID . "<br>";

        foreach ($t as $topicId) {
          echo "ScriptureId: $scriptureId, topicId: $topicId";
          // Again, first prepare the statement
          $statement = $db->prepare('INSERT INTO scripture_topic(scripture_id, topic_id) VALUES(:scriptureId, :topicId)');
          // Then, bind the values
          $statement->bindValue(':scriptureId', $scriptureId);
          $statement->bindValue(':topicId', $topicId);
          $statement->execute();
        }


      }
      catch (Exception $ex) {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
      }
      
      // finally, redirect them to a new page to actually show the topics
      //header("Location: showTopics.php");
      
      die(); // we always include a die after redirects. In this case, there would be no
             // harm if the user got the rest of the page, because there is nothing else
             // but in general, there could be things after here that we don't want them
             // to see.*/
    }
    ?>
  </body>
</html>
