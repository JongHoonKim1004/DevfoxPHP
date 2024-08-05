<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?php
    # session
    session_start();

    # MySQL
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection Error". $conn->connect_error);
    }

    # Users
    $id = $_POST["username"];
    $pwd = $_POST["password"];
    
    $stmt = $conn->prepare("select * from users where username = ? and password = ?");
    if($stmt === false) {
      die("Prepare Error". $conn->connect_error);
    }

    $stmt->bind_param("ss" ,$id, $pwd);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION["username"] = $row["username"];
      echo "<script>
        location.href='../board/list.php';
      </script>";
    } else{
      echo "<script>
        alert('Invalid username and password');
        history.go(-1);
      </script>";
    }

    $stmt->close();
    $conn->close();
  ?>
</head>
<body>
  
</body>
</html>