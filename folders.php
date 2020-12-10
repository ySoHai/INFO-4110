<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Folders</h2>

      <div class="gallery-container">

        <?php
        require "includes/foldercontainer.php";
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
