<?php
$conn = mysqli_connect("localhost", "root", "111111", "info");
settype($_POST['comment_num'], 'integer'); //topic_id
  $sql = "
    DELETE
      FROM comment
      WHERE comment_num = {$_POST['comment_num']}
    ";
    $result = mysqli_query($conn, $sql);
    if($result === false){
    echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
    echo '<a href="../list.php?id='.$_POST['content_topic'].'">돌아가기</a>';
    }
    else {
      header("Location: ../list.php?id=".$_POST['content_topic']."");

    }
 ?>
