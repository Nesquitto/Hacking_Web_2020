<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$update_link = '';
$delete_link = '';
$num = 1;
if(isset($_GET['id'])) {
  $sql = "SELECT * FROM topic LEFT JOIN privacy ON topic.author_id = privacy.num WHERE topic_id = {$_GET['id']};";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  if($_SESSION['num'] == $row['num']){
      $update_link = '
      <form action="update_topic.php" method="post">
        <input type = "hidden" name = "id" value = "'.$_GET['id'].'">
        <input type = "submit" value = "update">
      </form>
      ';
      $delete_link = '
      삭제하시려면 아래 칸에 delete를 입력해주세요.
        <form action="process_delete_topic.php" method="post">
          <input type = "hidden" name = "id" value = "'.$_GET['id'].'">
          <input type = "text" name = "delete" placeholder = "delete">
          <input type = "submit" value = " delete">
        </form>
        ';
  }
  $sql = "SELECT * FROM comment LEFT JOIN privacy ON comment.comment_author = privacy.num WHERE comment_topic = {$_GET['id']};";
  $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=$row['title']?></title>
  </head>
  <body>
    <h1>자유게시판</h1>
    <a href="freetalk.php">돌아가기</a>
    <br>
    <h2><?=$row['title']?></h2>
    <?=$row['description']?>
  </br>
  </br>
  </br>
    <?=$update_link?>
    <?=$delete_link?>

  <?php if(isset($_GET['id'])){ ?>
    <h3>댓글</h3>
    <table border = "1">
      <tr>
        <td>번호</td><td>댓글</td><td>작성시간</td><td>작성자</td><td>수정</td><td>삭제</td>
    <?php while($row2 = mysqli_fetch_array($result)){?>
          <tr>
            <td><?=$num++?></td>
            <td><?=$row2['content']?></td>
            <td><?=$row2['created']?></td>
            <td><?=$save = $row2['id']?></td>
          <?php if($_SESSION['id'] == $save){ ?>
            <td>
              <form  action="update_comment.php" method="post">
                <input type="hidden" name="content_topic" value="<?=$_GET['id']?>">
                <input type="hidden" name="comment_num" value="<?=$row2['comment_num']?>">
                <input type="submit" value="update">
              </form></td>
            <td>
              <form  action="process_delete_comment.php" method="post">
                <input type="hidden" name="content_topic" value="<?=$_GET['id']?>">
                <input type="hidden" name="comment_num" value="<?=$row2['comment_num']?>">
                <input type="submit" value="delete">
              </form>
            </td>
          <?php } ?>
          </tr>
        <?php }//while ?>
      </tr>
    </table>
  </br>
    <?php } //if?>


    <form  action="process_create_comment.php" method="post">
      <input type="hidden" name="content_topic" value="<?=$_GET['id']?>">
      <textarea name="content" placeholder="댓글입력"></textarea>
      <input type="submit" value="submit">
    </form>
  </body>
</html>
