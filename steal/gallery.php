<?php
  // Credit to my Patron Joseph White, for providing me these lesson files after all my files got deleted from my Patreon! Made it a lot easier to re-create this lesson :)
  // To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
  require "header.php";
  $_SESSION["username"] = "Admin";
?>

<main>
  <section class="cases-links">
    <div class="wrapper">
      <h2>Gallery</h2>
      <div class="gallery-container">

        <?php
          include_once "includes/dbh.inc.php";

          $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          }
          else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<a href="#">
                <div style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . ');"></div>
                <h3>' . $row["titleGallery"] . '</h3>
                <p>' . $row["descGallery"] . '</p>
              </a>';
            }
          }
        ?>

      </div>

      <?php
        if (isset($_SESSION['username'])) {
          echo'<div class="gallery-upload">
            <form class="form-signup" action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
              <input type="text" name="filename" placeholder="File name...">
              <input type="text" name="filetitle" placeholder="Image title...">
              <input type="text" name="filedesc" placeholder="Image Description...">
              <input type="file" name="file">
              <button type="submit" name="submit">UPLOAD</button>
            </form>
          </div>';
        }
      ?>

    </div>
  </section>
</main>

<?php
  // And just like we include the header from a separate file, we do the same with the footer.
  require_once "footer.php";
?>
