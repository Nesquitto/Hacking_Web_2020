<?php
require_once('module/manage.php');
session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nesquitto</title>
  </head>
  <body>
    <?php
    account();
?>

<a href="index.php?show=1">자유게시판</a>
<a href="index.php?show=2">프로필</a>
<a href="index.php?show=3">검색</a>
<a href="index.php?show=4">랭킹</a>
<!-- 자유게시판 부분 -->
<?php
if($_GET['show'] == 1){
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{$page = 1;}
    content_list($page);
    ?></br>
    <?php
    if(isset($_SESSION['id'])){
      manage_topic();
    }
}
    ?>
  <?php
  if($_GET['show'] == 2){
    if(isset($_SESSION['id'])){
      show_profile();
    }
    else{
      ?>
      <h1>프로필</h1>
      <?php
      echo "로그인을 해주세요!";
    }
}
if($_GET['show'] == 3){
  search_content();
  if(isset($_POST['searchingkeyword'])){
    inputkeyword($_POST['searchingkeyword']);
  }
}

if($_GET['show'] == 4){
  show_rank();
}
     ?>
  </body>
</html>
