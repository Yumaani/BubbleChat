<?php
  session_start();

  $_SESSION = array();
  session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Logout success</title>
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
    <div class="signup_box">
      <h2>ログアウトしました</h2>
      
      <button class="button_size" onclick="location.href='index.html'">
        Bubble chat
      </button>
    </div>
  </body>
</html>
