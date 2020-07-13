<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");


//$_GET['id'] = topic_id
if(isset($_POST['id'])) {
$sql = "SELECT * FROM topic LEFT JOIN privacy ON topic.author_id = privacy.num WHERE topic_id = {$_POST['id']};";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
    if ($_SESSION['num'] == $row['num']) {
      $result = '
              <form action="process/update_topic.php" method="post">
                <input type="hidden" name="id" value="'.$_POST['id'].'">
                <p><input type = "text" name = "title" placeholder="title" value="'.$row['title'].'"</p>
                <p><textarea name="description" placeholder="description">'.$row['description'].'</textarea></p>
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
    <title><?=$_POST['id']?></title>
  </head>
  <body>
    <h1>자유게시판</h1>
    <h2>게시글 수정</h2>
      <?=$result?>
    </br>
      <a href="freetalk.php">돌아가기</a>
  </body>
</html>
