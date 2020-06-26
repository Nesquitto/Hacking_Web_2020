<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");

$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
  'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);

$sql = "
  INSERT INTO topic
    (title, description, created, author_id)
    VALUES(
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        {$filtered['author_id']}
      )
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
  echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
  }
 ?>
