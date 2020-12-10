<?php

  require "header.php";

?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Delete Files</h2>
      <div class="gallery-container">
        <h4>Click Column Header to Sort</h4>
        <?php
        require "includes/filecontainer.php";
        ?>

      </div>

      <?php
          echo'<div class="gallery-upload">

            <form class="form-signup" action="includes/deletefile.php" method="post">
              <p><strong>Enter Filename(s) To Delete</strong></p>
              <input type="text" name="filename" id="filename" placeholder="Seperate each name with comma (,)" >
              <button type="submit" name="submit">Delete</button>
            </form>
          </div>';
      ?>

    </div>
  </section>
</main>

<?php

  require_once "footer.php";
?>
