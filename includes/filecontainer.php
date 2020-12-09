<?php
// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('./uploads', FilesystemIterator::SKIP_DOTS);
// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);

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


echo '<table>
      <tr>
      <th>Folder</th>
      <th>File Name</th>
      <th>Size</th>
      <th>Dowload Link</th>
      </tr>';
// Basic loop displaying different messages based on file or folder
  foreach ($it as $fileinfo) {
      if ($fileinfo->isDir()) {
        echo'<tr>';
        echo '<td>'. strtoupper($fileinfo->getFilename()).'</td>';
        echo'</tr>';
      }elseif ($fileinfo->isFile()) {
            echo '<tr>
                  <td></td>
                  <td> <img src="../uploads/' . $it->getSubPath() . '/' .$fileinfo->getFilename().'" width="35" height="35">'.$fileinfo->getFilename() . '</td>
                  <td>' . formatSizeUnits($fileinfo->getSize()) . '</td>
                  <td><a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'">Download</a></td>
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
