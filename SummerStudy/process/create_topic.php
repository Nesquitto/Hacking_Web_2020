<?php
session_start();
if(isset($_SESSION['id'])){
  $conn = mysqli_connect("localhost", "root", "111111", "info");
  $sql = "select * from privacy where id = '{$_SESSION['id']}'";
  $res = mysqli_fetch_array(mysqli_query($conn, $sql));
  $filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    );
  $sql = "
    INSERT INTO topic
      (title, description, created, author_id)
      VALUES(
          '{$filtered['title']}',
          '{$filtered['description']}',
          NOW(),
          {$res['num']}
        );
    ";

    $result = mysqli_query($conn, $sql);
    $sql = "
    UPDATE privacy
      SET
        point = point + 5
      WHERE
        num = {$res['num']}
        ";
    $result = mysqli_query($conn, $sql);
    header('Location: ../index.php?show=1');
}
else{
  echo "로그인해주세요. <a href='../index.php?show=1'>돌아가기</a>";
}

 ?>
