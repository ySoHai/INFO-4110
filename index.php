<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Files</h2>
      <div class="gallery-container">
        <h4>Click Column Header to Sort</h4>
        <br>
        <h6>
          TO DO:<br>
          -Fix CSS (IDK WHAT IM DOING)<br>
          -Fix column sort for download link
          -Fix table for folders page<br>
          -Make drag and drop area bigger (add js popout to upload??)<br>
          -Searching by file name<br>
          -Establish rules for new file types (prob cant do cuz brain small boi)<br>
        </h6>
        <?php
        require "includes/filecontainer.php";
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
