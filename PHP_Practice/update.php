<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>index4.php</title>
  </head>
  <body>
    <h1><a href="update.php">WEB</a></h1>
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
    <?php } ?>
  </br>
     <form action="update_process.php" method="post">
      <input type="hidden" name="old_title" value="<?=$_GET['id']?>">
       <p>
           <input type="text" name="title" placeholder="Title" value="<?php echo $_GET['id'] ?>">
       </p>
       <p>
           <textarea name="description" placeholder="description"><?php  echo file_get_contents('./data/'.$_GET['id']); ?></textarea>
       </p>
       <input type="submit">
     </form>
  </body>
</html>
