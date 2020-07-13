<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$filter = htmlspecialchars($_POST['content_topic']);
$filtered = array(
  'content'=>mysqli_real_escape_string($conn, $_POST['content']),
  'content_topic'=>mysqli_real_escape_string($conn, $_POST['content_topic'])
);
$sql = "
  INSERT INTO comment
    (content, created, comment_topic, comment_author)
    VALUES(
        '{$filtered['content']}',
        NOW(),
        {$filtered['content_topic']},
        {$_SESSION['num']}
      );
  ";

  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  echo "<a href='../list.php?id=".$filter."'>돌아가기</a>";
  }
  else {
    $sql = "
    UPDATE privacy
      SET
        point = point + 1
      WHERE
        num = {$_SESSION['num']}
        ";
    $result = mysqli_query($conn, $sql);
  header("Location: ../list.php?id=".$filter."");
  }
 ?>
