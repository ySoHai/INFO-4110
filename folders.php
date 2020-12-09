<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Files</h2>
      <button> Sort by file name </button>
      <button> Sort by size </button>

      <div class="gallery-container">

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
              echo '<a href="#">
              <div style="background-image: url(uploads/' .$it->getSubPath().'/'. $fileinfo->getFilename() . ');"></div>
              <h3> Folder: ' . $it->getSubPath() . '</h3>
              <p>' . $fileinfo->getFilename() . '</p>
              </a>';
            }
        }
      ?>

      </div>

      <?php
          echo'<div class="gallery-upload">
            <form class="form-signup" action="includes/uploads.php" method="post" enctype="multipart/form-data">
              <p><strong>Drag & Drop or Choose File</strong></p>
              <input type="file" name="fileToUpload" id="fileToUpload">
              <button type="submit" name="submit">UPLOAD</button>
            </form>
          </div>';
      ?>

    </div>
  </section>
</main>

<?php

  require_once "footer.php";
?>
