<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>index2.php</title>
  </head>
  <body>
    <h1><a href="index3.php">WEB</a></h1>
    <ol>
     </br>
     <?php
     $list = scandir("./data");
     $i = 0;
     while($i<count($list)){
       if ($list[$i]!='.' && $list[$i]!='..') {
         echo "<li><a href=\"index3.php?id=$list[$i]\">$list[$i]</a></li>\n";
       }
       $i= $i + 1;
     }
      ?>
    </ol>
    <h1><a href="create.php">create</a></h1>
    <?php
    if (isset($_GET['id'])) {
      echo file_get_contents('./data/'.$_GET['id']);
    }
    else {
      echo "hello";
    }
    ?>
  </body>
</html>
