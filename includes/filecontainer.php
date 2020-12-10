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


echo '<table class="sortable">
      <thead>
      <tr>
      <th>File Name</th>
      <th>Folder</th>
      <th>Size</th>
      <th>Access Date (MM/DD)</th>
      <th>Created Date (MM/DD)</th>
      <th>Dowload Link</th>
      </tr>
      </thead>';
      // 1 File Name</th>
      // 2 Folder</th>
      // 3 Size</th>
      // 4 Last Access</th>
      // 5 Created Date</th> filectime
      // 6 Dowload Link</th>


// Basic loop displaying different messages based on file or folder
  foreach ($it as $fileinfo) {
      if ($fileinfo->isFile()) {
            $filePath = "/var/www/html/uploads/". $it->getSubPath() ."/". $fileinfo->getFilename();
            echo '<tbody><tr><td>';
            if (in_array($it->getSubPath(), $supported_image)) {
               echo '<img src="' . "../uploads/". $it->getSubPath() ."/". $fileinfo->getFilename() . '" width="35" height="35">';
            }

            echo  $fileinfo->getFilename() . '</td>
                  <td><u><b>'. strtoupper($it->getSubPath()).'</b></u></td>
                  <td style="text-align: center; vertical-align: middle;">' . formatSizeUnits($fileinfo->getSize()) . '</td>
                  <td style="text-align: center; vertical-align: middle;">' . date("j/d G:i",fileatime($filePath)) .'</td>
                  <td style="text-align: center; vertical-align: middle;">' . date("j/d G:i",filectime($filePath)) . '</td>
                  <td style="text-align: center; vertical-align: middle;"><a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'">Download</a></td>
                  </tr>
                  </tbody>';
          }
  }

echo '</table>';
