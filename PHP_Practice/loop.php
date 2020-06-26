<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>loop.php</title>
  </head>
  <body>
    <h1>not while</h1>
    <?php
      echo '1<br>';
      echo '2<br>';
      echo '3<br>';
    ?>
    <h1>use while</h1>
    <?php
      $i = 1;
      while ($i <= 3) {
        echo $i.'<br>';
        $i = $i + 1;
      }
    ?>
  </body>
</html>
