<?php
$fileNames = $_POST['filename'];
$removeSpaces = str_replace(" ", "", $fileNames);
$allFileNames = explode(",", $removeSpaces);
$countAllNames = count($allFileNames);
$targetDir = '../uploads/';

for ($i=0; $i < $countAllNames; $i++) {
  if (file_exists($targetDir.$allFileNames[$i]) == false) {
    echo "<script>alert('Delete Error File Does Not Exists');document.location='../delete.php'</script>";
    exit();
  }
}

for ($i=0; $i < $countAllNames; $i++) {
  $path = $targetDir.$allFileNames[$i];
  if (!unlink($path)) {
      echo "<script>alert('Delete Error');document.location='../delete.php'</script>";
      exit();
  }
}

echo "<script>alert('Successfully Deleted');document.location='../delete.php'</script>";



?>
