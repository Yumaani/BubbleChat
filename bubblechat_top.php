<?php
session_start();
ini_set('display_errors', "On");
error_reporting(E_ALL);
?>
<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  $pdo = new PDO("sqlite:SQL/data.sqlite");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $st = $pdo->query("select * from user where username != '" .$_SESSION["user"]."';");
  $data = $st->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>bubblechat
    </title>
    <link rel="stylesheet" href="style.css">
    <script src='move.js'></script>
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
    <?php
      if (isset($_SESSION["user"])) { 
        print '<div class="login"> <h3>' . $_SESSION["user"] . ' ';
        print '<button class="button_logout" onclick="location.href=\'bubblechat_logout.php\'">Log out</button></h3></div>';
      } else {
        print '<p class="login"><?php echo $artic; ?><a href="bubblechat_login.php">ログイン</a></p>';
      }

      print '<form  action="chattest.php">';
      foreach($data as $user) {
        $st = $pdo->query("select MAX(id) from message where  from_name='".h($user["username"])."' and to_name='".h($_SESSION["user"])."';");
        // $st = $pdo->query("select MAX(id) from message where  from_name='".h($_SESSION["user"])."' and to_name='".h($user["username"])."';");
        $message_data = $st->fetchAll();

        if(isset($_SESSION[$user["username"]])){
          if($message_data[0][0]==$_SESSION[$user["username"]]){
            $style="background-color: #a3d8f6;";
          }else{
            $style="background-color: #fac9da;";
          }
        }else{
          $style="background-color: #a3d8f6;";
          $_SESSION[$user["username"]] = $message_data[0][0];
        }

        
        

        $st = $pdo->query("select count(*) from message where from_name='".h($_SESSION["user"])."' and to_name='".h($user["username"])."' or from_name='".h($user["username"])."' and to_name='".h($_SESSION["user"])."';");
        $data2 = $st->fetchAll();
        // var_dump($data2);

        print '<button  style="width: calc('.$data2[0][0].'px + 60px);'.$style.' height: calc('.$data2[0][0].'px + 60px); animation-delay:-'.strval($user["user_id"]).'s;" class="user_bubble" name="to_name" value="'.h($user["username"]).'" type="submit">'.h($user["username"]).'</button>';
      }
      print '</form>';
    ?>

  </body>
</html>
