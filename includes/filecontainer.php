<?php
// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('./uploads', FilesystemIterator::SKIP_DOTS);
// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);

echo '<table>
      <tr>
      <th>Folder</th>
      <th>File Name</th>
      <th>Size</th>
      <th>Dowload Link</th>
      </tr>';
// Basic loop displaying different messages based on file or folder
foreach ($it as $fileinfo) {
  if ($fileinfo->isDir()){
    echo '<tr>
          <td>'.$fileinfo->getFilename.'</td>';
    } elseif ($fileinfo->isFile()) {
        echo '<td>'.$fileinfo->getFilename() . '</td>
              <td>' . $fileinfo->getSize() . '</td>
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
