<!doctype html>
<html lang="en">
  <head>
      <form action="index.php" method="post">
          Username: <p><input type="text" name="username" value="username"required></p>
          Password: <p><input type="password" name="password" value="password"required></p>
          <input type="submit" name="login">
          <?php
          if(isset($_GET['error'])){
              echo "login failed";
          }
          if(isset($_GET['authentication'])){
              echo "Unauthorized page! Please login!";
          }
          mysqli_close($db_con);
          ?>
      </form>
  </head>
</html>
