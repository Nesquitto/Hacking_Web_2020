<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
settype($_POST['id'], 'integer');
$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = "
  UPDATE topic
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    WHERE
      topic_id = {$_POST['id']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
      echo "<a href='../list.php?id=".$_POST['id']."'>돌아가기</a>";
  }
  else {
    header("Location: ../list.php?id=".$_POST['id']."");
  }
  //id = topic_id
 ?>
