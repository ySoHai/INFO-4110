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

echo '<table>
      <tr>
      <th>File Name</th>
      <th>Folder</th>
      <th>Size</th>
      <th>Access Date (MM/DD)</th>
      <th>Created Date (MM/DD)</th>
      <th>Dowload Link</th>
      </tr>';
      // 1 File Name</th>
      // 2 Folder</th>
      // 3 Size</th>
      // 4 Last Access</th>
      // 5 Created Date</th> filectime
      // 6 Dowload Link</th>
      // td style="text-align: center; vertical-align: middle;">' . date("j/d/y H:i", fileatime("../uploads/' . $it->getSubPath() . '/' .$fileinfo->getFilename().'") . '</td>
      // <td style="text-align: center; vertical-align: middle;">' . date("j/d/y H:i", filectime("../uploads/' . $it->getSubPath() . '/' .$fileinfo->getFilename().'") . '</td>

// Basic loop displaying different messages based on file or folder
  foreach ($it as $fileinfo) {
      if ($fileinfo->isFile()) {
            $filepath = "/var/www/html/uploads/". $it->getSubPath() ."/". $fileinfo->getFilename();
            echo '<tr><td>';
            if (in_array($it->getSubPath(), $supported_image)) {
               echo '<img src="' . "../uploads/". $it->getSubPath() ."/". $fileinfo->getFilename() . '" width="35" height="35">';
            }

            echo  $fileinfo->getFilename() . '</td>
                  <td><u><b>'. strtoupper($it->getSubPath()).'</b></u></td>
                  <td style="text-align: center; vertical-align: middle;">' . formatSizeUnits($fileinfo->getSize()) . '</td>
                  <td style="text-align: center; vertical-align: middle;">' . date("j/d G:i",fileatime($filepath)) .'</td>
                  <td style="text-align: center; vertical-align: middle;">' . date("j/d G:i",filectime($filepath)) . '</td>
                  <td style="text-align: center; vertical-align: middle;"><a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'">Download</a></td>
                  </tr>';
          }
  }

echo '</table>';

/* OLD file conteiner
  echo '<a>
  <div style="background-image: url(uploads/' . $it->getSubPath() .'/'. $fileinfo->getFilename() . ');"></div>
  <h3> Folder: ' . $it->getSubPath() . '</h3>
  <p>' . $fileinfo->getFilename() . '</p>
  <p>Size: ' . $fileinfo->getSize() . '</p>
  <a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'"></a>
  </a>';
*/
