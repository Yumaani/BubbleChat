<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
  </div>
  <button class="button_b button_up" onclick="location.href='index.html'">top</button>
  <div class="signup_box">
  

  <h2>Log in</h2>
    <form action ="bubblechat_login_submit.php" class="column" method="get">
    <p>username</p>
    <input type="text" class="keyarea" name="username">
    <p>password</p>
    <input type="password" class="keyarea" name="password">
    <input type=submit  class="button_create" value="Login">
    </form>
</div>
    
  </body>
</html>
