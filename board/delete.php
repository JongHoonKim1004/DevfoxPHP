<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <script>
    <?php
    # MySQL
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection Error". $conn->connect_error);
    }

    # parameter
    $bno = $_POST["bno"];

    $stmt = $conn->prepare("DELETE FROM board WHERE bno = ?");
    $stmt->bind_param("i", $bno);
    if( $stmt->execute() ) {
      echo "
      alert('Delete Complete');
      location.replace('./list.php');
      ";
    } else{
      echo "
      alert('Delete Error');
      history.go(-1);
      ";
    }

    $stmt->close();
    $conn->close();
    ?>
  </script>
</body>
</html>