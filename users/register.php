<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <?php
  // MySQL
  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "php";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection Error". $conn->connect_error);
  }

  // Users
  $id = $_POST["username"];
  $nickname = $_POST["nickname"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $stmt = $conn->prepare("INSERT INTO users(username, nickname, password, email, phone) VALUES (?, ?, ?, ?, ?)");
  if ($stmt === false) {
      die("Prepare Error: " . $conn->error);
  }
  
  $stmt->bind_param("sssss", $id, $nickname, $password, $email, $phone);
  if($stmt->execute()){
    echo "<script>
    alert('register success');
    location.href = './login_form.php';
    </script>";
  } else{
    echo "<script>
    alert('error occured :". $stmt->error ."');
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