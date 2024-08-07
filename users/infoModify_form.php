<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEVFOX INFO MODIFY</title>
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
      <a class="nav-link" href="../board/list.php">List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./infoModify_form.php">회원정보변경</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./logout.php">Logout</a>
    </li>
  </ul>
</nav>
<div class="row justify-content-md-center">
  <div class="col-md-4 bg-light p-5">
    <form action="./infoModify.php" method="post" name="frm">
      <input type="hidden" name="uno" id="uno">
      <h4 style="text-align: center;">Information Modify</h4>
      <div class="form-group input-group pt-3">
        <div class="input-group-append">
          <span class="input-group-text">username</span>
        </div>
        <input type="text" name="username" id="username" readOnly class="form-control">
      </div>
      <div class="form-group input-group">
        <div class="input-group-append">
          <span class="input-group-text">nickname</span>
        </div>
        <input type="text" name="nickname" id="nickname" class="form-control">
      </div>
      <div class="form-group input-group">
        <div class="input-group-append">
          <span class="input-group-text">password</span>
        </div>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div class="form-group input-group">
        <div class="input-group-append">
          <span class="input-group-text">pw Check</span>
        </div>
        <input type="password" name="passwordCheck" id="passwordCheck" class="form-control">
      </div>
      <div class="form-group input-group">
        <div class="input-group-append">
          <span class="input-group-text">email</span>
        </div>
        <input type="email" name="email" id="email" class="form-control" readOnly>
      </div>
      <div class="form-group input-group">
        <div class="input-group-append">
          <span class="input-group-text">phone</span>
        </div>
        <input type="text" name="phone" id="phone" class="form-control">
      </div>
      <div class="form-group row pt-3">
        <div class="col-md-6">
          <button class="btn btn-block btn-danger" type="button" onclick="location.href='../board/list.php'">list</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-block btn-warning" type="submit" onclick="return modifyCheck()">modify</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  <?php
    # session
    session_start();

    # MySQL
    $servername = "localhost";
    $name = "root";
    $pwd = "1234";
    $dbname = "php";
    $conn = new mysqli($servername, $name, $pwd, $dbname);
    if ($conn->connect_error) {
      die("Connection Error". $conn->connect_error);
    }

    # Users
    if(isset($_SESSION["username"])){
      $username = $_SESSION["username"];
    } else{
      echo "
      alert('Invalid Access');
      history.go(-1);
      ";
    }

    $stmt = $conn->prepare("select * from users where username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $uno = $row["uno"];
      $nickname = $row["nickname"];
      $email = $row["email"];
      $phone = $row["phone"];

      echo "
      document.getElementById('uno').value = '$uno';
      document.getElementById('username').value = '$username';
      document.getElementById('nickname').value = '$nickname';
      document.getElementById('email').value = '$email';
      document.getElementById('phone').value = '$phone';
      ";
    }
  ?>

  function modifyCheck(){
    if(document.frm.password.value.trim() == ""){
      alert("insert password");
      frm.password.focus();
      return false;
    }
    if(document.frm.passwordCheck.value.trim() == ""){
      alert("insert password check");
      frm.passwordCheck.focus();
      return false;
    }
    if(document.frm.password.value != document.frm.passwordCheck.value){
      alert("Incorrect Password");
      frm.password.focus();
      return false;
    }

    return true;
  }
</script>
</body>
</html>