<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="row justify-content-md-center">
    <div class="col-md-4 bg-light p-5 mt-5">
      <form action="./login.php" method="post" name="frm">
        <h3 style="text-align: center;">PHP BOARD LOGIN</h3>
        <div class="form-group input-group pt-3">
          <div class="input-group-append">
            <span class="input-group-text">username</span>
          </div>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group input-group">
          <div class="input-group-append">
            <span class="input-group-text">password</span>
          </div>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="row justify-content-md-center mt-5">
          <div class="col-md-8">
            <button class="btn btn-primary btn-block" type="submit" onclick="return loginFormCheck()">login</button>
          </div>
        </div>
        <div class="row justify-content-md-center mt-3">
          <div class="col-md-8">
            <button class="btn btn-warning btn-block" type="button" onclick="location.href='./register_form.php'">register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    function loginFormCheck(){
      if(document.frm.username.value.trim() == ""){
        alert("insert id");
        frm.username.focus();
        return false;
      }
      if(document.frm.password.value.trim() == ""){
        alert("insert password");
        frm.password.focus();
        return false;
      }

      return true;
    }
  </script>
</body>
</html>