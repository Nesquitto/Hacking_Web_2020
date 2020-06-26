<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$sql = "
  INSERT INTO topic
    (title, description, created, author_id)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW(),
        {$_SESSION['num']}
      );
  ";

  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
  echo '저장에 성공했습니다. <a href="freetalk.php">돌아가기</a>';
  }
 ?>
