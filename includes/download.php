<?
$fileName = basename($_GET['file']);
$fileExt = explode('.', $fileName);

$targetDir = '../uploads/'.$fileExt.'/';
$filePath = $targetDir.$fileName;
echo $fileName;
echo $fileExt;
echo $targetDir;
echo $filePath;


if(file_exists($filePath)){ // file does not exist
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($filePath));
  readfile($filePath);
} else {
  die('file not found');
}
