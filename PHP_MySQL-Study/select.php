<?php
$conn = mysqli_connect("localhost", "root", "111111", "testdb");
// 1row
echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id = 10 LIMIT 100";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];

// all row
echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic LIMIT 100";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){//값이 null이 될 때까지 출력하니까 전체를 출력할 수 있다.
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];
}
 ?>
