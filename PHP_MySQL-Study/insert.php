<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");
$result = mysqli_query($conn, "
  INSERT INTO topic
    (title, description, created)
    VALUES(
      'MySQL',
      'MySQL is ....',
       NOW()
      )");
if($result == false)
   echo mysqli_error($conn);
?>
