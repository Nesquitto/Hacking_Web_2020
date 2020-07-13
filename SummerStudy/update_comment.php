<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");


//$_POST['comment_num'] = comment_num
if(isset($_POST['comment_num'])) {
$sql = "SELECT * FROM comment LEFT JOIN privacy ON comment.comment_author = privacy.num WHERE comment_num = {$_POST['comment_num']};";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
    if ($_SESSION['num'] == $row['num']) {
      $show = '
              <form action="process/update_comment.php" method="post">
                <input type="hidden" name="comment_topic" value="'.$row['comment_topic'].'">
                <input type="hidden" name="comment_num" value="'.$_POST['comment_num'].'">
                <p><textarea name="content" placeholder="content">'.$row['content'].'</textarea></p>
                <p><input type = "submit"></p>
              </form>
              ';
    }
}
else {
  $result = '';
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>댓글 수정</title>
  </head>
  <body>
    <h1>자유게시판</h1>
    <h2>댓글 수정</h2>
      <?=$show?>
    </br>
      <a href="freetalk.php">돌아가기</a>
  </body>
</html>
