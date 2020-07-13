<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$filtered = array(
  'content'=>mysqli_real_escape_string($conn, $_POST['content']),
  'comment_topic'=>mysqli_real_escape_string($conn, $_POST['comment_topic'])
);
settype($_POST['content_num'], 'integer');
$sql = "
  UPDATE comment
    SET
      content = '{$filtered['content']}'
    WHERE
      comment_num = {$_POST['comment_num']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
    echo "<a href='../list.php?id=".$filtered['comment_topic']."'>돌아가기</a>";
  }
  else {
    header("Location: ../list.php?id=".$filtered['comment_topic']."");
  }
  //id = topic_id
 ?>
