<?php
rename('data/'.$_POST['old_title'],'data/'.$_POST['title']);
file_put_contents('data/'.$_POST['title'], 'data/'.$_POST['description']);
header('Location: /index4.php?id='.$_POST['title']);
 ?>
