<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");

$sql = "SELECT * FROM topic LEFT JOIN privacy ON topic.author_id = privacy.num;";
$result = mysqli_query($conn, $sql);
$a = 1
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>자유게시판</title>
  </head>
  <body>
    <h1>자유게시판</h1>
    <a href="index.php">돌아가기</a>
    <br>
    <table border = "1">
      <tr>
        <td>번호</td><td>제목</td><td>작성시간</td><td>작성자</td><td>이동</td>
    <?php while($row = mysqli_fetch_array($result)){?>
          <tr>
            <td><?=$a++?></td>
            <td><?=$row['title']?></td>
            <td><?=$row['created']?></td>
            <td><?=$row['id']?></td>
            <td><a href="list.php?id=<?=$row['topic_id']?>">이동</a></td>
          </tr>
        <?php
      } ?>
      </tr>
    </table>

    <form action="create_topic.php" method="post">
      <input type="submit" name="create" value="create">
    </form>
  </body>
</html>
