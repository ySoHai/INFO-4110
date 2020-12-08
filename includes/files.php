<?php
// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('./uploads', FilesystemIterator::SKIP_DOTS);
// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);
// Basic loop displaying different messages based on file or folder
foreach ($it as $fileinfo) {
  if ($fileinfo->isFile()) {
      echo '<a>
      <div style="background-image: url(uploads/' .$it->getSubPath().'/'.$fileinfo->getFilename(). ');"></div>
      <h3> Folder: ' . $it->getSubPath() . '</h3>
      <p>' . $fileinfo->getFilename() . '<br>Size:'.$fileinfo->getSize().'</p>
      <a href="download.php?file=uploads/'. $it->getSubPath().'/'. $fileinfo->getFilename() .'"></a>
      </a>';
    }// need to get size
}
