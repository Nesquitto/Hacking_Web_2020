<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");

$filtered = array(
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile']),
);

$sql = "
  INSERT INTO author
    (name, profile)
    VALUES(
        '{$filtered['name']}',
        '{$filtered['profile']}'
      )
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
  header('Location: author.php');
  }
 ?>
