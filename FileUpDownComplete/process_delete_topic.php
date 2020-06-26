<?php
$conn = mysqli_connect("localhost", "root", "111111", "info");
settype($_POST['id'], 'integer'); //topic_id
if ($_POST['delete'] == 'delete') {
  $sql = "
    DELETE
      FROM topic
      WHERE topic_id = {$_POST['id']}
    ";
    $result = mysqli_query($conn, $sql);
    if($result === false){
    echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요. <a href='freetalk.php'>돌아가기</a>";
    }
    else {
      $sql = "
      delete
      From upload_file
      where file_content = {$_POST['id']}
      ";
      $result = mysqli_query($conn, $sql);
      if($result === false){
      echo "파일 삭제 중 오류가 발생했습니다. <a href='freetalk.php'>돌아가기</a>";
      }
      else {
        echo '삭제에 성공했습니다. <a href="freetalk.php">돌아가기</a>';
      }
    }
}
else {
  echo "삭제에 실패했습니다. delete를 제대로 입력했는지 확인해주세요";
  echo '<a href="list.php?id='.$_POST['id'].'"> 돌아가기</a>';
}
 ?>
