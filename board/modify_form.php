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

      # parameter
      $bno = $_GET["bno"];

      # MySQL
      $servername = "localhost";
      $name = "root";
      $pwd = "1234";
      $dbname = "php";
      $conn = new mysqli($servername, $name, $pwd, $dbname);
      if ($conn->connect_error) {
        die("Connection Error". $conn->connect_error);
      }

      $stmt = $conn->prepare("SELECT * FROM board WHERE bno = ?");
      $stmt->bind_param("i", $bno);
      $stmt->execute();
      $result = $stmt->get_result();

    ?>
  </ul>
</nav>

<div class="row justify-content-md-center">
  <div class="col-md-6 p-5 bg-light">
    <h3 class="mt-3 pb-3">Board Modify</h3>
    <div class="mt-5">
      <form action="modify.php" method="post" name="frm">
        <?php
          while ($row = $result->fetch_assoc()) {
            $title = $row["title"];
            $writer = $row["writer"];
            $content = $row["content"];
            $bno = $row["bno"];
            ?>
            <div class="form-group input-group">
              <div class="input-group-append">
                <span class="input-group-text">bno</span>
              </div>
              <input type="text" name="bno" id="bno" readOnly value='<?=$bno?>' class="form-control">
            </div>
            <div class="form-group input-group">
              <div class="input-group-append">
                <span class="input-group-text">title</span>
              </div>
              <input type="text" name="title" id="title" value='<?=$title?>' class="form-control">
            </div>
            <div class="form-group input-group">
              <div class="input-group-append">
                <span class="input-group-text">writer</span>
              </div>
              <input type="text" name="writer" id="writer" readOnly value='<?=$writer?>' class="form-control">
            </div>
            <div class="form-group">
              <label for="content">content</label>
              <textarea rows="10" name="content" id="content" class="form-control"><?=$content?></textarea>
            </div>
            <?php
          }
        ?>
        <div class="form-group">
          <button class="btn btn-danger" type="button" onclick="location.href='./list.php'" style="float: right; margin-left: 10px;">list</button>
          <button class="btn btn-warning" type="button" onclick="resetForm()" style="float: right; margin-left: 10px;">reset</button>  
          <button class="btn btn-primary" type="submit" onclick="return modifyCheck()" style="float: right;">modify</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function resetForm(){
    document.frm.title.value = "";
    document.frm.content.value = "";
  }

  function modifyCheck(){
    if(document.frm.title.value.trim() == ""){
      alert("insert title");
      frm.title.focus();
      return false;
    }
    if(document.frm.writer.value.trim() == ""){
      alert("Invalid Access");
      location.replace("./list.php");
      return false;
    }
  }
</script>
</body>
</html>
