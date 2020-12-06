<?php
$fileNames = $_POST['filename'];
$removeSpaces = str_replace(" ", "", $fileNames);
$allFileNames = explode(",", $removeSpaces); //array
$countAllNames = count($allFileNames);
$targetDir = '../uploads/';



foreach ($allFileNames as $value) {
  $ext = pathinfo($value, PATHINFO_EXTENSION);
  $realTargetDir = $targetDir.$ext.'/';

  if (file_exists($realTargetDir.$value)) {
    if (!unlink($realTargetDir.$value)) {
        echo "<script>alert('Delete Error');document.location='../delete.php'</script>";
        exit();
    }
    else {
          echo "<script>alert('Successfully Deleted');document.location='../delete.php'</script>";
    }
  }
  else {
    echo "<script>alert('Delete Error: File Does Not Exist');document.location='../delete.php'</script>";
    exit();
    }
}


?>
