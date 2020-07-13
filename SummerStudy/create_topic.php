<?php
require_once('module/manage.php');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>새 글 작성</title>
  </head>
  <body>
<?php
    account();
    create_topic();
?>

  </body>
</html>
