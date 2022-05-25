<!DOCTYPE html>
<?php
session_start();
ini_set('display_errors', "On");
error_reporting(E_ALL);
  if (isset($_GET["username"]) && isset($_GET["password"])&& isset($_GET["password_again"])) {
    $username = $_GET["username"];
    $password = $_GET["password"];
    $password_again = $_GET["password_again"];

    $pdo = new PDO("sqlite:SQL/data.sqlite");
    $st = $pdo->prepare("select username from user where username =?");
    $st->execute(array($username));
    $user_on_db = $st->fetch();
    if(!$user_on_db){
      if($password_again==$password){
        $pdo = new PDO("sqlite:SQL/data.sqlite");
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $st = $pdo->prepare("INSERT INTO user(username, password) VALUES (?, ?)");
        $st -> execute(array($username, $password));

        
        $result = "Your account was created";
        $check=TRUE;
      }else{
        $result = "The two passwords are different";
        $check=false;
      }
    }else{
      $result = "The same user name exists. Please change it.";
      $check=false;
    }
    
  }
  else {
    $result = "Please try again";
    $check=false;
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign in succeed</title>
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
    <h2><?php print $result;?></h2>
    <?php 
    if ($check) {
      print '<button class="button_size" onclick="location.href=\'bubblechat_login.php\'">Log in</button>';
    }else{
      print '<button class="button_size" onclick="location.href=\'bubblechat_signup.php\'">Back</button>';
    }
      ?>
      

      
    </div>
  </body>
</html>
