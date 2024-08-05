<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ID CHECK</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php
    // Parameter
    $username = $_GET["username"];

    // MySQL
    $servername = "localhost";
    $name = "root";
    $password = "1234";
    $dbname = "php";
    $conn = new mysqli($servername, $name, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection Error". $conn->connect_error);
    }

    $username = $conn->real_escape_string($username);
    $sql = "select COUNT(*) as count from users where username = $username;";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
      $count = $row["count"];
    } else{
      echo "<script>
        alert('id insert error');
        window.close();
      </script>";
    }
    
    echo "<script>
      
      console.log('RESULT : $count');
      const count = $count;
    </script>"
  ?>
</head>

  <div class="row bg-light p-5">
    <div class="col-md-12">
      <h4 style="text-align: center;" id="resultText"></h4>
      <form action="./idCheck.php" method="get">
        <div class="input-group pt-3 pb-3">
          <input type="text" name="username" id="username" class="form-control">
        </div>
      </form>
      <input type="hidden" name="usernameChecked" id="usernameChecked">
      <button class="btn btn-primary" style="float: right;" onclick="return idOk()">use</button>
    </div>
  </div>
  
  <script>
    <?php
      echo "
      document.getElementById('username').value = $username;
      document.getElementById('usernameChecked').value = $username;
      ";
    ?>

    $("#usernameChecked").hide();
    if(count == 0){
      $("#usernameChecked").show();
      $("#resultText").html("이용 가능합니다.<br>이용하시겠습니까?");
    } else{
      $("#resultText").html("이용이 불가능합니다.");
    }

    function idOk(){
      var id = document.getElementById('usernameChecked').value;

      if(confirm("정말로 " + id + " 를 사용하시겠습니까?")){
        window.opener.document.frm.rename.value = id;
        window.opener.document.frm.username.value = id;
        window.opener.document.frm.username.setAttribute("readOnly", true);
        window.close();
      }
    }
  </script>
</body>
</html>