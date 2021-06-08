<nav class="navbar navbar-light bg-light">
    <div class="container-fluid px-5 flex justify-content-between align-items-center">
        <a href="<?php echo $_SESSION["DOCUMENT_ROOT"] . "/user-app/index.php" ?>"
            class="navbar-brand mb-0 h1">Homepage</a>
        <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      echo '<a href="' . $_SESSION["DOCUMENT_ROOT"] . '/user-app/src/logout.php" class="btn btn-danger">Logout</a>';
    }
    ?>

    </div>
</nav>