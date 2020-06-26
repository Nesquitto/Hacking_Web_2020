<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");
settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),//sql 인젝션과 같은 공격을 막기 위한 mysqli_real_escape_string
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);
$sql = "
  UPDATE author
    SET
      name = '{$filtered['name']}',
      profile = '{$filtered['profile']}'
    WHERE
      id = {$filtered['id']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
    header('Location: author.php?id'.$filtered['id']);
  }
 ?>
