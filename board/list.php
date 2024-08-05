<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEVFOX BOARD_PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/logout.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="./list.php">List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../users/infoModify_form.php">회원정보변경</a>
    </li>
    <?php
      # session
      session_start();

      if(isset($_SESSION["username"])){
        echo '
          <li class="nav-item">
            <a class="nav-link" href="../users/logout.php" onclick="return logoutCheck()">Logout</a>
          </li>
        ';
      }
    ?>
  </ul>
</nav>


</body>
</html>
<?php

?>