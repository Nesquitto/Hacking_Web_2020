<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$filtered = array(
  'nick_change'=>mysqli_real_escape_string($conn, $_POST['nick_change']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile']),
  'now_pass'=>mysqli_real_escape_string($conn, $_POST['now_pass']),
  'change_pass'=>mysqli_real_escape_string($conn, $_POST['change_pass']),
  're_pass'=>mysqli_real_escape_string($conn, $_POST['re_pass'])
);


if($_POST['what'] == 1){
if(isset($filtered['nick_change'])){
  if(strlen($_POST['nick_change'])<21){
  $sql = "select exists (select * from privacy where Nickname = '{$filtered['nickname']}') as success";
  $res = mysqli_fetch_array(mysqli_query($conn, $sql));
  if($res['success'] == 0){
    $sql = "
      UPDATE privacy
        SET
          nickname = '{$filtered['nick_change']}'
        WHERE
          id = '{$_SESSION['id']}'
      ";
      $result = mysqli_query($conn, $sql);
      if($result === false){
      echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
      ?>
      <a href="../sign_up.php?show=2">돌아가기</a>
      <?php
      }
      else {
      header('Location: ../index.php?show=2');
      }
    }

  }
  else{
    echo "데이터의 길이가 너무 깁니다. 다시 입력해주세요.";
  }
}
}






else if($_POST['what'] == 2){
if(isset($filtered['profile'])){
  if(strlen($_POST['profile'])<101){
    $sql = "
      UPDATE privacy
        SET
          profile = '{$filtered['profile']}'
        WHERE
          id = '{$_SESSION['id']}'
      ";
      $result = mysqli_query($conn, $sql);
      if($result === false){
      echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
      ?>
      <a href="../sign_up.php?show=2">돌아가기</a>
      <?php
      }
      else {
      header('Location: ../index.php?show=2');
      }
    }

  else{
    echo "데이터의 길이가 너무 깁니다. 다시 입력해주세요.";
  }

}
}

else if($_POST['what'] == 3){
if(strlen($filtered['change_pass']) < 21 && $filtered['change_pass'] == $filtered['re_pass']){
  $sql = "select * from privacy where id = '{$_SESSION['id']}'";
  $res = mysqli_fetch_array(mysqli_query($conn, $sql));
  if($res['pw'] == $filtered['now_pass']){
    $sql = "
      UPDATE privacy
        SET
          pw = '{$filtered['change_pass']}'
        WHERE
          id = '{$_SESSION['id']}'
      ";
  $res = mysqli_query($conn, $sql);
  header('Location: ../index.php?show=2');
  }
  else{
    echo "현재 패스워드가 일치하지 않습니다. 다시 입력해주세요. <a href='../index.php?show=2'>돌아가기</a>";
  }
}
else{
  echo "데이터가 올바르지 않습니다. 다시 입력해주세요. <a href='../index.php?show=2'>돌아가기</a>";
}
}

else{}

 ?>
