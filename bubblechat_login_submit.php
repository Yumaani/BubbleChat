<?php
session_start();
ini_set('display_errors', "On");
error_reporting(E_ALL);
  if (isset($_GET["username"]) && isset($_GET["password"])) {
    $username = $_GET["username"];
    $password = $_GET["password"];

   
    $pdo = new PDO("sqlite:SQL/data.sqlite");
    $st = $pdo->prepare("select username from user where username =?");
    $st->execute(array($username));
    $user_on_db = $st->fetch();

    $st = $pdo->prepare("select username from user where password =?");
    $st->execute(array($password));
    $user_password = $st->fetch();

    if (!$user_on_db) {
      $result = "指定されたユーザーが存在しません";
      $check=false;
    }else if ($user_password){
      $_SESSION["user"] = $username;
      $result = "ようこそ" . $username . "さん。";
      $check=true;
    }else {
      $result = "パスワードが違います";
      $check=false;
    }

  }
?>
<!-- <!DOCTYPE html> -->
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Login success</title>
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
      <?php 
      print'<h2>'.$result.'</h2>';
      if ($check) {
        print '<button class="button_size" onclick="location.href=\'bubblechat_top.php\'">Home</button>';
      }else{
        print '<button class="button_size" onclick="location.href=\'bubblechat_login.php\'">Back</button>';
      }
      ?>
    </div>
  </body>
</html>
