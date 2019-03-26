<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <?php 
      session_start();
      if (!empty($_SESSION['remember'])) {
        if (!empty($_SESSION['name'])) {
          header ('Location: display.php');
        }
      }
     ?>
    <div class="container">
      <form class="form-signin" role="form" action="authenticator.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Login" name="login" required >
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" name="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <div class="form-signin"><a href="reg.php">регестрировать</a></div>
    </div> <!-- /container -->
  </body>
</html>