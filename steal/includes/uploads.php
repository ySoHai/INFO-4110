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

  if($fileError == 0 ){
    if (!is_dir($realDir)) {
      mkdir($realDir);
    }
      if (!file_exists($realDir.$fileName)) {
        if ($fileSize < 504857600) {
        //  $fileNameNew = $fileName.".".$fileActualExt;
          $fileDestination =   $realDir.$fileName;
          move_uploaded_file($fileTmpName, $fileDestination);
         // header("Location: index.php?uploadsuccess");
          echo "Success";
        }
        else {
          echo "Your file is bigger than 500MB! Try Again!";
        }
      }
      else {
        echo "File already exist! Try Again!";
      }
  }
  else {
    echo "There was an error uploading your file! Try Again!";
  }


}
