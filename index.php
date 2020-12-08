<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Files</h2>
      <div class="gallery-container">

        <?php
        require "includes/files.php";
        // Basic loop displaying different messages based on file or folder
        foreach ($it as $fileinfo) {
          if ($fileinfo->isFile()) {
              echo '<a>
              <div style="background-image: url(uploads/' .$it->getSubPath().'/'.$fileinfo->getFilename(). ');"></div>
              <h3> Folder: ' . $it->getSubPath() . '</h3>
              <p>' . $fileinfo->getFilename() . 'Size:'.$fileinfo->getSize().'</p>
              <a href="includes/download.php?file='. $it->getSubPath().'/'. $fileinfo->getFilename() .'"></a>
              </a>';
            }// get size
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
