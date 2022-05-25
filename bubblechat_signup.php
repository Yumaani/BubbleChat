<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>
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
    <h2>Please create your account</h2>
    <form action="bubblechat_signup_submit.php" class="column" method="get">
      <p>Username(公開されます)</p>
      <input type="text" name="username" class="keyarea" required="">
      <p>Password</p>
      <input type="password" name="password" class="keyarea" required="">
      <p>Password again</p>
      <input type="password" name="password_again" class="keyarea" required="">
      <input type="submit" class="button_create" value="Create">
    </form>
    </div>
    
  </body>
</html>