<?php
  require "header.php";
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



    </div>
  </section>
</main>

<?php
  require_once "footer.php";
?>
