<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Write</title>
</head>
<body>
  <script>
    <?php
    // MySQL
    $servername = "localhost";
    $name = "root";
    $password = "1234";
    $dbname = "php";
    $conn = new mysqli($servername, $name, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection Error". $conn->connect_error);
    }

    $title = htmlspecialchars($_POST["title"], ENT_QUOTES);
    $writer = $_POST["writer"];
    $content = htmlspecialchars($_POST["content"], ENT_QUOTES);
    date_default_timezone_set("Asia/Seoul");
    $regDate = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO board(title, writer, content, regDate) VALUES(?, ?, ?, ?);");
    $stmt->bind_param("ssss", $title, $writer, $content, $regDate);

    if($stmt->execute()){
      echo "
      alert('Insert Conplete');
      location.replace('./list.php');
      ";
    }
    ?>
  </script>
</body>
</html>