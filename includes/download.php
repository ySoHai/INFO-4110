<?
setlocale(LC_ALL,'en_US.UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
echo exec('whoami');

$fileName = basename($_GET['file']);
$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
$targetDir = '../uploads/'.$fileExt.'/';
$filePath = $targetDir.$fileName;

echo '<html>
<body>';
echo $fileName.'<br>';
echo $fileExt.'<br>';
echo $targetDir.'<br>';
echo $filePath.'<br>';
echo '</html>
</body>';
/*
if(file_exists($filePath)){ // file does not exist
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($fileName));
  readfile($filePath);
} else {
  die('file not found');
}
*/

?>
