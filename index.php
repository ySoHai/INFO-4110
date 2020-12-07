<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Files</h2>
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
          if ($fileinfo->isDir()) {
              //printf("Folder - %s\n", $fileinfo->getFilename());
              echo '<h3>' . $fileinfo->getFilename . '</h3>';
          } elseif ($fileinfo->isFile()) {
              //printf("File From %s - %s\n", $it->getSubPath(), $fileinfo->getFilename());
              echo '<div style="background-image: url(img/gallery/' .$it->getSubPath(). $fileinfo->getFilename() . ');"></div>
              <p>' . $fileinfo->getFilename() . '</p>';
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
