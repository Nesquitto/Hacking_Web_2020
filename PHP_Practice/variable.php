<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Variable.php</title>
  </head>
  <body>
    <h2>기본 문자작성</h2>
    <?php
      echo 1+1;
     ?>
     <h2>변수 활용작성</h2>
     <?php
     $a = 10;
     echo $a+1;
     ?>
     <h1>변수를 사용하는 이유</h1>
     <?php
     $name = "egoing";
     echo "Lorem ipsum dolor sit amet, consectetur ".$name." adipisicing elit, sed do eiusmod tempor incididunt ut labore ".$name." et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
     ?>
  </body>
</html>
