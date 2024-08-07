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
        $username = $_SESSION["username"];
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
  <div class="col-md-6 p-5 bg-light">
    <h3 class="mt-3 pb-3">Board Write</h3>
    <form action="./write.php" method="POST" name="frm">
      <div class="form-group input-group pt-5">
        <div class="input-group-append">
          <span class="input-group-text">Title</span>
        </div>
        <input type="text" name="title" id="title" class="form-control">
      </div>
      <div class="form-group input-group pt-2">
        <div class="input-group-append">
          <span class="input-group-text">Writer</span>
        </div>
        <input type="text" name="writer" id="writer" class="form-control" readOnly>
        <?php
          echo "<script>document.getElementById('writer').value = $username</script>";
        ?>
      </div>
      <label for="content" class="pt-2">Content</label>
      <textarea class="form-control" name="content" id="content" rows="10"></textarea>
      <div class="row pt-5 justify-content-md-end">
        <div class="col-md-5">
          <button class="btn btn-primary" type="submit" onclick="return writeCheck()" style="float: right;">write</button>
          <button class="btn btn-warning" type="button" style="float: right; margin-right: 20px;" onclick="location.href='./list.php'">list</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function writeCheck(){
    if(document.frm.title.value.trim() == ""){
      alert("insert title");
      frm.title.focus();
      return false;
    }
    if(document.frm.writer.value.trim() == ""){
      alert("Invalid Access");
      location.href="login_form.php";
    }

    return true;
  }
</script>

</body>
</html>