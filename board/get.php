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
  <script>
    <?php
      # session
      session_start();
      
      # parameter
      $bno = $_GET["bno"];
      if($bno == ""){
        echo "
        alert('Invalid Access');
        ";
      }
    ?>
  </script>
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
    <h3 class="mt-3 pb-3">Board Read</h3>
    <div class="row pb-5">
      <div class="col-md-11"></div>
      <div class="col-md-1">
        <button class="btn btn-primary btn-sm" type="button" onclick="location.href='./write_form.php'">Write</button>
      </div>
    </div>
    <div class="mt-3">
      <table class="table table-border">
        <tbody>
          <?php
          # MySQL
          $servername = "localhost";
          $name = "root";
          $password = "1234";
          $dbname = "php";
          $conn = new mysqli($servername, $name, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection Error". $conn->connect_error);
          }

          $stmt = $conn->prepare("SELECT * FROM board WHERE bno = ?");
          $stmt->bind_param("i", $bno);
          $stmt->execute();
          $result = $stmt->get_result();
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              $title = $row["title"];
              $writer = $row["writer"];
              $content = $row["content"];
              $regDate = $row["regDate"];
              ?>
              <tr>
                <th width="10%">bno</th>
                <td width="40%"><?=$bno?></td>
                <th width="10%">writer</th>
                <td width="40%"><?=$writer?></td>
              </tr>
              <tr>
                <th width="10%">title</th>
                <td width="40%"><?=$title?></td>
                <th width="10%">regDate</th>
                <td width="40%"><?=$regDate?></td>
              </tr>
              <tr>
                <th width="10%">content</th>
                <td colspan="3"><?=$content?></td>
              </tr>
              <tr>
                <td colspan="4">
                  <div class="row">
                    <div class="col-md-12">
                      <form method="post" action="#" name="frm">
                        <?php
                          echo "
                          <input type='hidden' name='bno' id='bno' value='$bno'>
                          ";
                        ?>
                        <button class="btn btn-danger" type="button" style="float: right;" onclick="getForm('delete')">delete</button>
                        <button class="btn btn-warning" type="button" style="float: right; margin-right: 10px;" onclick="getForm('modify')">modify</button>
                      </form>
                    </div>
                  </div>
                </td>
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
<script>
  function getForm(command){    
    if(command == 'delete'){
      document.frm.action = "./delete.php";
      frm.submit();
    } else if(command == 'modify'){
      document.frm.action = "./modify_form.php";
      document.frm.method = "get";
      frm.submit();
    } else {
      alert("Invalid Access");
      return false;
    }
  }
</script>
</body>
</html>