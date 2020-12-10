<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Folders</h2>
      <h4>Click Column Header to Sort</h4>
      <div class="gallery-container">

        <?php
          require "includes/foldercontainer.php";
        ?>

      </div>

      <?php
          echo'<div class="gallery-upload">
                <form class="form-signup" action="includes/folder.php" method="post">
                  <p><strong>Create Folder</strong></p>
                  <input type="text" name="foldername" id="foldername" placeholder="Enter Folder Name" >
                  <button type="submit" name="submit">Create Folder</button>
                </form>
              </div>';
      ?>

    </div>
  </section>
</main>

<?php

  require_once "footer.php";
?>
