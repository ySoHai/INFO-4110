<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('./uploads', FilesystemIterator::SKIP_DOTS);
// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);


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

echo '<table class="table-sortable">
      <tr>
      <th><u>Folders</u></th>
      <th>   </th>
      <th>   </th>
      <th>Is file empty</th>
      </tr>';

// Basic loop displaying different messages based on file or folder
  foreach ($it as $fileinfo) {
      if ($fileinfo->isDir()) {
            echo '<tr>
                  <td style="text-align: center; vertical-align: middle;"><u><b>'. strtoupper($fileinfo->getFilename()) .'</b></u>
                  </td>
                  <td></td>
                  <td></td>';
            if (dir_is_empty('./uploads/' . $fileinfo->getFilename() . '/')) {
              echo '<td style="text-align: center; vertical-align: middle;">True</td>
                    </tr>';
            }else {
              echo '<td style="text-align: center; vertical-align: middle;">False</td>
                    </tr>';
            }

          }
  }

echo '</table>';
