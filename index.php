<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <?php 
  session_start();

  if(isset($_SESSION["username"])){
    echo "<script>
      location.href='./board/list.php';
      </script>";
  } else {
    echo "<script>
      alert('로그인이 필요합니다.');
      location.href='./users/login_form.php';
      </script>";
  }
  
  
?>
</head>
<body>
  
</body>
</html>
