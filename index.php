<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Files</h2>
      <div class="gallery-container">

        <?php
        foreach (new DirectoryIterator('../uploads') as $fileInfo) {
            if($fileInfo->isDot()) continue;
            echo $fileInfo->getFilename() . "<br>\n";
        }
        /*while ($row = mysqli_fetch_assoc($result)) {
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
