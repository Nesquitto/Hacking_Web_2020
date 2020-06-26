<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
  <body>
    <h1><a href="index.php">Nesquitto's test page!</a></h1>
    <h2>회원가입</h2>
    <form action="process_sign_up.php" method="post">
      <h4>Id</h4>
      <input type="text" name="id" value="" placeholder="Id를 입력해주세요.">
      <h4>Pw</h4>
      <input type="password" name="pw" placeholder="PW를 입력해주세요.">
      <h4>Pw 다시 입력</h4>
      <input type="password" name="pw_re" placeholder="PW를 다시 입력해주세요">
      <h4>자기소개</h4>
      <textarea name="profile" placeholder="자기소개 해주세요..ㅎ"></textarea>
    </br>
      <input type="submit" name="Sign Up" value="Sign Up">
    </form>
  </body>
</html>
