<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>strinig.php</title>
  </head>
  <body>
    <h2>기본적인 문자작성</h1>
    <?php
      echo "helloworld";
    ?>
    <h2>문자 사이에 작은따음표 사용하기</h2>
    <?php
      echo "hello'W'orld";
    ?>
    <h2>문자열 합치기</h2>
    <?php
      echo "hello ".'world';
    ?>
    <h2>문자열의 길이확인</h2>
    <?php
      echo strlen("helloworld");
    ?>
  </body>
</html>
