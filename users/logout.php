<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
</head>
<body>
  <script>
    <?php
      # session
      session_start();

      if(isset($_SESSION["username"])){
        unset($_SESSION["username"]);
        echo "
        alert('Logout Complete');
        location.href='./login_form.php';
        ";
      } else{
        echo "
        alert('Invalid Access');
        location.href='login_form.php';
        ";
      }
    ?>
  </script>
</body>
</html>