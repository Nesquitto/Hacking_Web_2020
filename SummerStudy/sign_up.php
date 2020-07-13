<?php
require_once('module/manage.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입 중...</title>
  </head>
  <body>
    <?php
    account();
    ?>
    <h2>회원가입</h2>
    <form action="process/sign_up.php" method="post">
      <h4>아이디(최대 20자)</h4>
      <input type="text" name="id" value="" placeholder="Id를 입력해주세요.">
      <h4>비밀번호(최대 20자)</h4>
      <input type="password" name="pw" placeholder="PW를 입력해주세요.">
      <h4>비밀번호 다시 입력</h4>
      <input type="password" name="pw_re" placeholder="PW를 다시 입력해주세요">
      <h4>별명(최대 20자)</h4>
      <input type="text" name="nickname" value="" placeholder="당신의 별명은?">
      <h4>자기소개(최대 100자)</h4>
      <textarea name="profile" placeholder="자기소개 해주세요..ㅎ"></textarea>
    </br>
      <input type="submit" name="Sign Up" value="Sign Up">
    </form>
  </body>
</html>
