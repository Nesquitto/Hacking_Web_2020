<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
settype($_POST['comment_num'], 'integer');
$sql = "
  UPDATE comment
    SET
      content = '{$_POST['content']}'
    WHERE
      comment_num = {$_POST['comment_num']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
    echo '저장에 성공했습니다. <a href="list.php?id='.$_POST['comment_topic'].'">돌아가기</a>';
  }
  //id = topic_id
 ?>
