<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");
settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = "
  DELETE
    FROM topic
    WHERE author_id = {$filtered['id']}
";
$sql = "
  DELETE
    FROM author
    WHERE id = {$filtered['id']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
    header('Location: author.php');
  }
 ?>
