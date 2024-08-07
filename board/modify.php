<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEVFOX modify</title>
</head>
<body>
  <script>
    <?php
      # MySQL
      $servername = "localhost";
      $name = "root";
      $pwd = "1234";
      $dbname = "php";
      $conn = new mysqli($servername, $name, $pwd, $dbname);
      if ($conn->connect_error) {
        die("Connection Error". $conn->connect_error);
      }

      # Board
      $bno = $_POST["bno"];
      $title = htmlspecialchars($_POST["title"], ENT_QUOTES);
      
      $content = htmlspecialchars($_POST["content"], ENT_QUOTES);
      date_default_timezone_set("Asia/Seoul");
      $regDate = date("Y-m-d H:i:s");

      $stmt = $conn->prepare("UPDATE board SET title = ?, content = ?, regDate = ? WHERE bno = ? ");
      $stmt->bind_param("sssi", $title, $content, $regDate, $bno);

      if( $stmt->execute() ) {
        echo "
        alert('Update Complete');
        location.replace('./get.php?bno=$bno');
        ";
      } else{
        echo "
        alert('Update Error');
        history.go(-1);
        ";
      }
    ?>
  </script>
</body>
</html>