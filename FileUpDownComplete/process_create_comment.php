<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$sql = "
  INSERT INTO comment
    (content, created, comment_topic, comment_author)
    VALUES(
        '{$_POST['content']}',
        NOW(),
        {$_POST['content_topic']},
        {$_SESSION['num']}
      );
  ";

  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
  echo '저장에 성공했습니다. <a href="list.php?id='.$_POST['content_topic'].'">돌아가기</a>';
  }
 ?>
