<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입 처리중...</title>
  </head>
  <body>
    <h1><a href="index.php"> Nesquitto</a></h1>
  </body>
</html>


<?php
$conn = mysqli_connect("localhost", "root", "111111", "info");
$sql = "select exists (select * from privacy where id = '{$_POST['id']}') as success";
$is = mysqli_fetch_array(mysqli_query($conn, $sql));
if(strlen($_POST['id'])<21 && strlen($_POST['pw'])<21 && strlen($_POST['profile'])<101 && strlen($_POST['nickname'])<21){
    if($is['success'] == 0){
      if($_POST['pw']==$_POST['pw_re']){

        $sql = "
          INSERT INTO privacy
            (id, pw, profile, nickname)
            VALUES(
                '{$_POST['id']}',
                '{$_POST['pw']}',
                '{$_POST['profile']}',
                '{$_POST['nickname']}'
              )
          ";

          $result = mysqli_query($conn, $sql);
          if($result === false){
          echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
          ?>
          <a href="../sign_up.php">돌아가기</a>
          <?php
          }
          else {
          echo '가입 완료했습니다. <a href="../index.php">돌아가기</a>';
          }
      }
      else {
        echo "비밀번호가 올바르지 않습니다. 다시 시도해주세요.";
        ?>
        <a href="../sign_up.php">돌아가기</a>
      <?php
      }
    }
    else{
      echo "중복된 아이디가 존재합니다. 다른 아이디로 시도해주세요.";
      ?>
      <a href="../sign_up.php">돌아가기</a>
      <?php
    }
}
else{
  echo "문자열의 길이가 초과하는 데이터가 존재합니다. 길이를 줄여 다시 시도해주세요."
  ?>
  <a href="../sign_up.php">돌아가기</a>
  <?php
}
?>
