<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>array.php</title>
  </head>
  <body>
    <h1>array</h1>
    <?php
      $coworkers = array('egoing', 'leeche', 'duru', 'taeho');
      echo $coworkers[1]."<br>";
      echo $coworkers[3]."<br>";
      var_dump(count($coworkers));
      array_push($coworkers, 'graphittie');
      echo "<br>";
      var_dump($coworkers);
      ?>
  </body>
</html>
