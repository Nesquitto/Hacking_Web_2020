<?php
function account(){
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$sql = "SELECT * FROM privacy where id = '{$_SESSION['id']}'";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($result);

if(isset($_SESSION['id'])){
  $main = '
  <h3>안녕하세요. '.$_SESSION["id"].'님!</h3>
  <h4>Points : '.$arr['point'].'</h4>
  *포인트는 게시글과 댓글을 달면 얻을 수 있습니다. (게시글 +5, 댓글 +1)</br>
  <a href = "process/sign_out.php">로그아웃</a>
  ';
}
else{
  $main = '
    <h4>비회원이시군요!</h4>
    <h5>게시글 작성은 로그인 후에 가능합니다.</h5>
    <h3>로그인</h3>
    <form action="process/sign_in.php" method="post">
      ID : <input type="text" name="id" value="" placeholder="Id를 입력해주세요.">
      <br>
      PW: <input type="password" name="pw" value="" placeholder="PW를 입력해주세요.">
      <br><br>
      <input type="submit" name="login" value="Login">
    </form>
    </br>
    <h4>아직 회원이 아니신가요?</h4>
    <a href="sign_up.php">회원가입</a>
    ';
}
 ?>
<h1><a href="index.php"> Nesquitto</a></h1>

<?php
 echo '<hr>';
 echo $main;
 echo '<hr>';
}





function content_list($page){
 ?>
 <?php
 session_start();
 $conn = mysqli_connect("localhost", "root", "111111", "info");

 $sql = "SELECT * FROM topic LEFT JOIN privacy ON topic.author_id = privacy.num;";
 $result = mysqli_query($conn, $sql);
 $rows_num = mysqli_num_rows($result);
 $total_page = ceil($rows_num / 10);
 $start_num = ($page-1) * 10;
 $sql2 = "select * from topic left join privacy on topic.author_id = privacy.num limit ".$start_num.", 10 ";
 $result2 = mysqli_query($conn, $sql2);
 $a = ($page-1)*10+1;
  ?>
     <h1>자유게시판</h1>
     <br>
     <h3><?=$page?> 페이지 입니다.</h3>
     <table border = "1">
       <tr>
         <td>번호</td><td>제목</td><td>작성시간</td><td>작성자</td><td>이동</td>
     <?php while($row = mysqli_fetch_array($result2)){?>
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
<?php
for($i = 1; $i<=$total_page; $i++){
  echo "<a href = 'index.php?show=1&&page={$i}'>{$i}</a> ";
}
 }





function manage_topic(){
  ?>
  <form action="create_topic.php" method="post">
    <input type="submit" name="create" value="create">
  </form>
  <?php
}
 ?>




<?php
function show_profile(){
?>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");

$sql = "SELECT * FROM privacy where id = '{$_SESSION['id']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);?>
<h3>Nickname</h3>
<?=$row['nickname']?>
<form action="../process/change.php" method="post">
    <input type="text" name="nick_change" placeholder="변경할 닉네임 입력">
    <input type="hidden" name="what" value="1">
    <input type="submit" name="submit" value="변경">
</form>
<h3>ID</h3>
<?=$row['id']?>
<h3>Profile</h3>
<?=$row['profile']?>
<form action="../process/change.php" method="post">
    <textarea name="profile" rows="8" cols="80" placeholder="자기소개 해주세요.ㅎㅎ" ><?=$row['profile']?></textarea>
    <input type="hidden" name="what" value="2">
    <input type="submit" name="submit" value="변경">
</form>
<h3>Points: <?=$row['point']?><h3>

<h3>Change Password</h3>
<form action="../process/change.php" method="post">
    <input type="password" name="now_pass" placeholder="현재 비밀번호">
  </br>
    <input type="password" name="change_pass" placeholder="변경할 비밀번호">
    <input type="password" name="re_pass" placeholder="다시 입력">
    <input type="hidden" name="what" value="3">
    <input type="submit" name="submit" value="제출">
</form>

<?php
}




function create_topic(){
  session_start();
  $conn = mysqli_connect("localhost", "root", "111111", "info");
?>
<h1>게시글 생성</h1>
<form action="process/create_topic.php" method="post">
  <p><input type = "text" name = "title" placeholder="title"</p>
  <p><textarea name="description" placeholder="description"></textarea></p>
  <p><input type = "submit"></p>
</form>

<br>
<hr>
<a href="index.php?show=1">돌아가기</a>
<?php
}




function search_content(){
  ?>
<h1>검색</h1>
<form action="index.php?show=3" method="post">
  <input type="text" name="searchingkeyword" placeholder="무엇을 검색하시겠어요?">
  <input type="submit" value="검색">
</form>
<?php
}

function inputkeyword($keyword){
  session_start();
  $conn = mysqli_connect("localhost", "root", "111111", "info");
  $filtered = mysqli_real_escape_string($conn, $keyword);
  $sql = "select * from topic LEFT JOIN privacy ON topic.author_id = privacy.num where title like '%{$filtered}%' or  description like '%{$filtered}%'";
  $result = mysqli_query($conn, $sql);
  $a = 1;
?>
<h4><?=$filtered?>를 키워드로 검색한 결과입니다.</h4>
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
<?php
}




function show_rank(){
  session_start();
  $conn = mysqli_connect("localhost", "root", "111111", "info");
  $sql = "select * from privacy order by point desc";
  $result = mysqli_query($conn, $sql);
  $a = 1;
?>
</br> </br> </br>
  <table border = "1">
    <tr>
      <td>순위</td><td>별명</td><td>Point</td>
  <?php while($row = mysqli_fetch_array($result)){?>
        <tr>
          <td width = "50"><?=$a++?></td>
          <td width = "100"><?=$row['nickname']?></td>
          <td width = "100"><?=$row['point']?></td>
        </tr>
      <?php
    } ?>
    </tr>
  </table>
<?php
}
?>
