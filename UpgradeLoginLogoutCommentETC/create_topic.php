<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>create</title>
  </head>
  <body>
    <h1>게시글 생성</h1>
    <form action="process_create_topic.php" method="post">
      <p><input type = "text" name = "title" placeholder="title"</p>
      <p><textarea name="description" placeholder="description"></textarea></p>
      <p><input type = "submit"></p>
    </form>
    <a href="freetalk.php">돌아가기</a>
  </body>
</html>
