<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//echo exec('whoami');

if(isset($_POST['submit'])){
  $file = $_FILES['fileToUpload'];

  $fileName = $_FILES['fileToUpload']['name'];
  $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
  $fileSize = $_FILES['fileToUpload']['size'];
  $fileError = $_FILES['fileToUpload']['error'];
  $fileType = $_FILES['fileToUpload']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $targetDir = '../uploads/';
  $realDir = $targetDir.$fileActualExt.'/';
  $fileDestination =  $realDir.$fileName;

  if($fileError == 0 ){
    if (!is_dir($realDir)) {
      mkdir($realDir);
    }
      if (strlen($fileName) < 36) {
        if (!file_exists($fileDestination)) {
          if ($fileSize < 504857600) {
            move_uploaded_file($fileTmpName, $fileDestination);
            echo "<script>alert('Successfully Uploaded');document.location='../index.php'</script>";
          }else {
            echo "<script>alert('Error: Your file is bigger than 500MB! Try Again');document.location='../index.php'</script>";
          }
        }else {
          echo "<script>alert('Error: File already exist!');document.location='../index.php'</script>";
        }
      }else {
        echo "<script>alert('Error: File name larger than 35 characters');document.location='../index.php'</script>";
      }
  }else {
    echo "<script>alert('There was an error uploading your file! Try Again!');document.location='../index.php'</script>";
  }


}
