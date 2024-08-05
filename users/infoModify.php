<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>infomodify</title>
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

      # Users
      $uno = $_POST["uno"];
      $nickname = $_POST["nickname"];
      $phone = $_POST["phone"];
      $password = $_POST["password"];

      $stmt = $conn->prepare("UPDATE users SET nickname = ?, password = ?, phone = ? WHERE uno = ?");
      if($stmt === false) {
        die("Prepare Error". $conn->connect_error);
      }

      if (!$stmt->bind_param("sssi", $nickname, $password, $phone, $uno)) {
        die("Binding Error: " . $stmt->error); // bind_param() 실패 시 오류 출력
      }

      if ($stmt->execute()) {
        echo "
        alert('Modify Complete\\nMove to List');
        location.replace('../board/list.php');
        ";
      } else {
        echo "
        alert('Error occurred: " . $stmt->error . "');
        history.go(-1);
        ";
      }

      $stmt->close();
      $conn->close();
    ?>
  </script>
</body>
</html>