<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$sql = "
  INSERT INTO topic
    (title, description, created, author_id)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW(),
        {$_SESSION['num']}
      );
  ";

  $result = mysqli_query($conn, $sql);


  if($result === false){
  echo '데이터가 올바르지 않습니다. 관리자에게 문의해주세요. <a href="freetalk.php">돌아가기</a>';
  }
  else {
    $sql = "SELECT topic_id From topic where title = '{$_POST['title']}';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result); //올라간 게시글의 번호 획득
    $uploadfile = $_FILES['upload']['name']; //업로드 파일 이름
    $error = $_FILES['myfile']['error'];
    $upload_dir = $_SERVER[DOCUMENT_ROOT].'/uploads/'.$row['topic_id']; //업로드 위치
    mkdir($upload_dir);
    if (move_uploaded_file($_FILES['upload']['tmp_name'], "$upload_dir/$uploadfile")) { //임시로 저장된 파일을 원하는 디렉토리에 넣기
      $sql = "
          INSERT INTO upload_file
            (file_name, file_uptime, file_content)
            VALUES(
                '{$_FILES['upload']['name']}',
                NOW(),
                {$row['topic_id']}
              );
      ";
      $result = mysqli_query($conn, $sql);
      if($result === false){
        echo '파일과 게시글을 결합하는 과정에서 오류가 발생했습니다. 관리자에게 문의해주세요. <a href="freetalk.php">돌아가기</a>';
      }
      else{
        echo "1. file name : {$_FILES['upload']['name']}<br />";
        echo "2. file type : {$_FILES['upload']['type']}<br />";
        echo "3. file size : {$_FILES['upload']['size']} byte <br />";
        echo '저장에 성공했습니다. <a href="freetalk.php">돌아가기</a>';
      }
    }
    else {
      echo '게시글 저장은 성공했지만, 파일 업로드에 실패했습니다. <a href="freetalk.php">돌아가기</a> ';
    }
  }
 ?>
