<?php
session_start();

$conn = mysqli_connect("localhost", "root", "111111", "info");

$sql = "SELECT * FROM privacy";
$result = mysqli_query($conn, $sql);

if(isset($_SESSION['id'])){
  $main = '
  <h3>안녕하세요'.$_SESSION["id"].'님!</h3>
  <a href = "process_sign_out.php">logout</a>
  <h2><a href="freetalk.php">자유게시판</a></h2>
  ';
}
else{
  $main = '
    <h5>로그인을 하셔야 게시판 이용이 가능합니다</h5>
    <h3>Login</h3>
    <form action="process_sign_in.php" method="post">
      ID : <input type="text" name="id" value="" placeholder="Id를 입력해주세요.">
      <br>
      PW: <input type="password" name="pw" value="" placeholder="PW를 입력해주세요.">
      <br><br>
      <input type="submit" name="login" value="Login">
    </form>
    <a href="sign_up.php">Sign Up</a>
    ';
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nesquitto</title>
  </head>
  <body>
    <h1>Nesquitto's test page!</h1>
    <?=$main?>
  </body>
</html>
