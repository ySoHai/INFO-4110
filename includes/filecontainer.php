<?php
// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('./uploads', FilesystemIterator::SKIP_DOTS);
// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    // $bytes /= pow(1024, $pow);
    // $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
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
  echo'<tr>';

    echo '<td>'. strtoupper($it->getSubPath()).'</td>';
    if ($fileinfo->isFile()) {
        echo '<td>'.$fileinfo->getFilename() . '</td>
              <td>' . formatBytes($fileinfo->getSize()) . '</td>
              <td><a href="includes/download.php?file='. urlencode($fileinfo->getFilename()) .'">Download</a></td>';
      }
  echo'</tr>';
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
