<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");
settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),//sql 인젝션과 같은 공격을 막기 위한 mysqli_real_escape_string
  'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = "
  UPDATE topic
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    WHERE
      id = {$filtered['id']}
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
  echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
  }
  else {
    echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
  }
 ?>
