<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEVFOX REGISTER</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>
  <div class="row justify-content-md-center">
    <div class="col-md-4 bg-light p-5 mt-5">
      <form action="./register.php" method="post" name="frm">
        <h3 style="text-align: center;">PHP BOARD REGISTER</h3>
        <div class="form-group input-group pt-3">
          <div class="input-group-append">
            <span class="input-group-text">username</span>
          </div>
          <input type="text" name="username" id="username" class="form-control">
          <input type="hidden" name="rename" id="rename">
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary btn-sm" style="float: right;" onclick="return idCheck()">CHECK</button>
        </div>
        <div class="form-group input-group pt-4">
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
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group input-group">
          <div class="input-group-append">
            <span class="input-group-text">phone</span>
          </div>
          <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <button class="btn btn-block btn-primary" type="submit" onclick="return registerCheck()">register</button>
          </div>
          <div class="col-md-6">
            <button class="btn btn-block btn-warning" type="reset">reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    function idCheck(){
      if(document.frm.username.value.trim() == ""){
        alert("insert id");
        frm.username.focus();
        return false;
      }

      var username = document.getElementById("username").value;
      window.open("./idCheck.php?username=" + username, "_blank", "width=600, height=300, resize=no")
    }

    function registerCheck(){
      if(document.frm.username.value.trim() == ""){
        alert("insert id");
        frm.username.focus();
        return false;
      }
      if(document.frm.rename.value.trim() == ""){
        alert("need id check");
        frm.username.focus();
        return false;
      }
      if(document.frm.nickname.value.trim() == ""){
        alert("insert nickname");
        frm.nickname.focus();
        return false;
      }
      if(document.frm.password.value.trim() == ""){
        alert("insert password");
        frm.password.focus();
        return false;
      }
      if(document.frm.passwordCheck.value.trim() == ""){
        alert("insert password Check");
        frm.passwordCheck.focus();
        return false;
      }
      if(document.frm.password.value != document.frm.passwordCheck.value){
        alert("password not match");
        frm.password.focus();
        return false;
      }
      if(document.frm.email.value.trim() == ""){
        alert("insert email");
        return false;
      }


      return true;
    }
  </script>
</body>
</html>