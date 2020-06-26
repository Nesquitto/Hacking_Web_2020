<?php
  $target_Dir = $_SERVER[DOCUMENT_ROOT]."/uploads/".$_POST['content_num']."/";
  $file_name = $_POST['file_name'];
  $down = $target_Dir.$file_name;
  $filesize = filesize($down);
  $dir = $target_Dir.$file_name;
  Header("Content-Type: application/octet-stream");
  Header("Content-Disposition: attachment; filename=".$file_name);
  Header("Content-Transfer-Encoding: binary");
  Header("Content-Length:".$filesize);
  Header("Cache-Control: cache, must-revalidate");
  Header("Pragma: no-cache");
  Header("Expires: 0");
  ob_clean();
  flush();
  $fp = fopen("$dir", "r");
  if (!fpassthru($fp))
    fclose($fp);
?>
