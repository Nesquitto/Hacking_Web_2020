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
       $i = 0;
       $list = scandir("./data");
       while($i<count($list)){
         if($list[$i]!='.'&&$list[$i]!='..'){
         echo "<li><a href=\"index4.php?id=$list[$i]\">$list[$i]</a></li>\n";
        }
        $i= $i + 1;
      }
        ?>
    </ol>
    <a href="create.php">create</a>
    <?php if(isset($_GET['id'])){?>
    <a href="update.php?id=<?php echo $_GET['id']; ?>">update</a>
    <form action="delete_process.php" method="post">
      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <input type="submit" value="delete">
    </form>
    <?php } ?>
  </br>
    <h1><?php
    echo $_GET['id'];
     ?>
   </h1>
   </br>
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
