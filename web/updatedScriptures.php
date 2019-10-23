<?php
required "dbConnect.php";
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
      $b = $_POST['book'];
      $ch = $_POST['chapter'];
      $v = $_POST['verse'];
      $c = $_POST['content'];
      $t = $_POST['topic'];
      $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)");
      $stmt->bindValue(':book', $b, PDO::PARAM_STR);
      $stmt->bindValue(':chapter', $ch, PDO::PARAM_INT);
      $stmt->bindValue(':verse', $v, PDO::PARAM_INT);
      $stmt->bindValue(':content', $c, PDO::PARAM_STR);
      $stmt->execute();
      
    }
    ?>
  </body>
</html>
