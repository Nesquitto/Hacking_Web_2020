<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
settype($_POST['id'], 'integer');
$sql = "
  UPDATE topic
    SET
      title = '{$_POST['title']}',
      description = '{$_POST['description']}'
    WHERE
      topic_id = {$_POST['id']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
    echo '저장에 성공했습니다. <a href="list.php?id='.$_POST['id'].'">돌아가기</a>';
  }
  //id = topic_id
 ?>
