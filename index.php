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
                echo("Folder - %s<br>", $fileinfo->getFilename());

            } elseif ($fileinfo->isFile()) {
                echo("File From %s - %s<br>", $it->getSubPath(), $fileinfo->getFilename());
            }
          }
          /*
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<a href="#">
            <div style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . ');"></div>
            <h3>' . $row["titleGallery"] . '</h3>
            <p>' . $row["descGallery"] . '</p>
          </a>';
        }
        */
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
