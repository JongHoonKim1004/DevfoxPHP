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
  <script src="../js/common.js"></script>
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

<div class="row justify-content-md-center">
  <div class="col-md-8 p-5 bg-light">
    <h3 class="mt-3 pb-3">Board List</h3>
    <div class="row pb-5">
      <div class="col-md-11"></div>
      <div class="col-md-1">
        <button class="btn btn-primary btn-sm" type="button" onclick="location.href='./write_form.php'">Write</button>
      </div>
    </div>
    <div class="tableDiv">
      <table class="table table-border">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>writer</th>
            <th>regDate</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // MySQL
          $servername = "localhost";
          $name = "root";
          $password = "1234";
          $dbname = "php";
          $conn = new mysqli($servername, $name, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection Error". $conn->connect_error);
          }

          $sql = "SELECT * FROM board WHERE bno > 0 ORDER BY bno DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $bno = $row["bno"];
              $title = $row["title"];
              $writer = $row["writer"];
              $regDate = $row["regDate"];

              ?>
              <tr>
                <td><?=$bno?></td>
                <td><a href='./get.php?bno=<?=$bno?>'><?=$title?></a></td>
                <td><?=$writer?></td>
                <td><?=$regDate?></td>
              </tr>
            <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
<?php

?>