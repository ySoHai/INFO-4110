<?php
setlocale(LC_ALL,'en_US.UTF-8');

$fileName = basename($_GET['file']);
$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
$targetDir = '../uploads/'.$fileExt.'/';
$filePath = $targetDir.$fileName;

if(file_exists($filePath)){ // file does not exist
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($fileName));
  echo $filePath;
  //readfile($filePath);
} else {
  die('file not found');
}

?>
