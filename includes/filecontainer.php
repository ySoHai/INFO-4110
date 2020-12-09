<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('./uploads', FilesystemIterator::SKIP_DOTS);
// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);

$supported_image = array(
    'gif',
    'jpg',
    'jpeg',
    'png'
);

function formatSizeUnits($bytes){
    if ($bytes >= 1073741824){
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576){
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024){
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1){
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1){
        $bytes = $bytes . ' byte';
    }
    else{
        $bytes = '0 bytes';
    }

    return $bytes;
}

function dir_is_empty($path)
{
    $empty = true;
    $dir = opendir($path);
    while($file = readdir($dir))
    {
        if($file != '.' && $file != '..')
        {
            $empty = false;
            break;
        }
    }
    closedir($dir);
    return $empty;
}


$mainDataArr = array();
foreach ($it as $fileinfo) {
  if ($fileinfo->isDir()) {
    $$fileinfo->getFilename() = array();
    $$fileinfo->getFilename()[0] = array() //fileName
    $$fileinfo->getFilename()[1] = array() //fileSize
    $$fileinfo->getFilename()[2] = array() //fileName
    $mainDataArr.push($$fileinfo->getFilename())
  } elseif ($fileinfo->isFile()) {
    //populate arrays
    $withoutExt = preg_replace('/\\.[^.\\s]{2,6}$/', '', $fileInfo->getFilename());
    $mainDataArr[$$withoutExt][0] = $fileinfo->getFilename()
    $mainDataArr[$$withoutExt][1] = formatSizeUnits($fileinfo->getSize())
    $mainDataArr[$$withoutExt][2] = urlencode($fileinfo->getFilename())
    //array[0] = fileName
    //array[1] = fileSize
    //array[2] = link
  }
}

echo '<table>
      <tr>
      <th>Folder</th>
      <th>File Name</th>
      <th>Size</th>
      <th>Dowload Link</th>
      </tr>';
foreach ($mainDataArr as &value){
  //mainDataArr[n] = fileType[]
  if (empty($value)){
    $foldername = preg_replace('/\\.[^.\\s]{2,6}$/', '', $value[0]);
    $fileName = $value[0]
    $fileSize = $value[1]
    $fileDownload =$value[2]
    echo '<td><u><b>'. strtoupper($foldername).'</b></u></td>
          </tr>
          <tr>
          <td></td>
          <td>No Files</td>
          </tr>';
  } else {
    echo '<td><u><b>'. strtoupper($foldername).'</b></u></td>
          </tr>'
          '<tr>
          <td></td>
          <td>';
    if (in_array($foldername, $supported_image)) {
      echo '<img src="../uploads/' . strtolower($foldername) . '/' .$fileName.'" width="35" height="35">';
    }

    echo  $fileName . '</td>
          <td style="text-align: center; vertical-align: middle;">' . formatSizeUnits($fileSize) . '</td>
          <td style="text-align: center; vertical-align: middle;"><a href="includes/download.php?file='. $fileDownload .'">Download</a></td>
          </tr>';
  } else {
    echo '<tr>
          <td>Folder Empty</td>
          </tr>';
  }
}


// echo '<table>
//       <tr>
//       <th>Folder</th>
//       <th>File Name</th>
//       <th>Size</th>
//       <th>Dowload Link</th>
//       </tr>';
// // Basic loop displaying different messages based on file or folder
//   foreach ($it as $fileinfo) {
//       if ($fileinfo->isDir()) {
//         echo '<tr>';
//         if (dir_is_empty('./uploads/' . $fileinfo->getFilename() . '/')) {
//           echo '<td><u><b>'. strtoupper($fileinfo->getFilename()).'</b></u></td>
//                 </tr>
//                 <tr>
//                 <td></td>
//                 <td>No Files</td>
//                 </tr>';
//         }else {
//           echo '<td><u><b>'. strtoupper($fileinfo->getFilename()).'</b></u></td>
//           </tr>';
//         }

//       }elseif ($fileinfo->isFile()) {
//             echo '<tr>
//                   <td></td>
//                   <td>';
//             if (in_array($it->getSubPath(), $supported_image)) {
//               echo '<img src="../uploads/' . $it->getSubPath() . '/' .$fileinfo->getFilename().'" width="35" height="35">';
//             }

//             echo  $fileinfo->getFilename() . '</td>
//                   <td style="text-align: center; vertical-align: middle;">' . formatSizeUnits($fileinfo->getSize()) . '</td>
//                   <td style="text-align: center; vertical-align: middle;"><a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'">Download</a></td>
//                   </tr>';
//           }else {
//             echo '<tr>
//                   <td>Folder Empty</td>
//                   </tr>';
//           }
//   }

// echo '</table>';

/* OLD file conteiner
  echo '<a>
  <div style="background-image: url(uploads/' . $it->getSubPath() .'/'. $fileinfo->getFilename() . ');"></div>
  <h3> Folder: ' . $it->getSubPath() . '</h3>
  <p>' . $fileinfo->getFilename() . '</p>
  <p>Size: ' . $fileinfo->getSize() . '</p>
  <a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'"></a>
  </a>';
*/
