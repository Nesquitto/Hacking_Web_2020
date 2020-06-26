<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>index2.php</title>
  </head>
  <body>
    <h1><a href="index2.php">WEB</a></h1>
    <ol>
      <?php
        $list = scandir("./data");
        echo "<li>$list[0]</li>\n";
        echo "<li>$list[1]</li>\n";
        echo "<li>$list[2]</li>\n";
        echo "<li>$list[3]</li>\n";
        echo "<li>$list[4]</li>\n";
        echo "<li>$list[5]</li>\n\n";
       ?>
    </ol>
    <ol>
     </br>
       <?php
       $i = 0;
       while($i<count($list)){
         echo "<li><a href=\"index2.php?id=$list[$i]\">$list[$i]</a></li>\n";
         $i= $i + 1;
       }
        ?>
    </ol>
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
