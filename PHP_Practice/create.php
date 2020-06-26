<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>index4.php</title>
  </head>
  <body>
    <h1><a href="index4.php">WEB</a></h1>
    <ol>
     </br>
     <?php
     $list = scandir("./data");
     $i = 0;
     while($i<count($list)){
       if ($list[$i]!='.' && $list[$i]!='..') {
         echo "<li><a href=\"index4.php?id=$list[$i]\">$list[$i]</a></li>\n";
       }
       $i= $i + 1;
     }
      ?>
    </ol>
    <form action="creat_process.php" method="post">
      <p>
          <input type="text" name="title" placeholder="Title">
      </p>
      <p>
          <textarea name="description" placeholder="description"></textarea>
      </p>
      <input type="submit">
    </form>
  </body>
</html>
