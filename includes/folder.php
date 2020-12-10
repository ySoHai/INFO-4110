<?php
$folderName = $_POST['foldername'];
$removeSpaces = str_replace(" ", "", $folderName);
$targetDir = '../uploads/';
$realDir = $targetDir.$folderName.'/';

if (!is_dir($realDir)) {
  mkdir($realDir);
  echo "<script>alert('Successfully Created Folder');document.location='../folder.php'</script>";
}else {
  echo "<script>alert('Error: Folder Already Exist');document.location='../folder.php'</script>";
}
