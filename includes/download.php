<?
$file = basename($_GET['file']);
$fileExt = explode('.', $file)
$targetDir = '../uploads/';
$filePath = $targetDir.$fileExt.'/'.$file;

if(!file_exists($filePath)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header('Content-Type: ' . $fileExt);
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}
?>
