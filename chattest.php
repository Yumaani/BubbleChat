<?php
session_start();
ini_set('display_errors', "On");
error_reporting(E_ALL);
function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
?>

<?php
if (isset($_GET["to_name"])){
    $to_name= h($_GET["to_name"]);
    $_SESSION["to_name"] = $to_name;
}else if(isset($_SESSION["to_name"])){
    $to_name=$_SESSION["to_name"];
}else{
    header( "Location: bubblechat_login.php" ) ;
	exit ;
}
$from_name= h($_SESSION["user"]);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>chattest</title>
    <link rel="stylesheet" href="style.css">          
  </head>
  <body>
  <button class="button_b button_up_sp" onclick="location.href='bubblechat_top.php'">Home</button>

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

  <div class="content">
    <form action="chattest_submit.php" class="form" method="get">
    <input type="text" size="40" name="content"></textarea>
    <input type="submit" value="Send">
    </form>
    <?php
    if (isset($_GET["to_name"])){
        $to_name= h($_GET["to_name"]);
        $_SESSION["to_name"] = $to_name;
    }else if(isset($_SESSION["to_name"])){
        $to_name=$_SESSION["to_name"];
    }else{
        header( "Location: bubblechat_login.php" ) ;
        exit ;
    }
    $from_name= h($_SESSION["user"]);
    $pdo = new PDO("sqlite:SQL/data.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->query("select * from message where from_name='".$from_name."' and to_name='".$to_name."' or from_name='".$to_name."' and to_name='".$from_name."' order by id desc;");
    $data = $st->fetchAll();
        print '<div class="name_zone"><div class="name from">'.h($from_name).'</div>';
        print '<div></div><div class="name to">'.h($to_name).'</div></div>';

    $st = $pdo->query("select MAX(id) from message where  from_name='".h($to_name)."' and to_name='".h($from_name)."';");
    // $st = $pdo->query("select MAX(id) from message where  from_name='".h($_SESSION["user"])."' and to_name='".h($user["username"])."';");
    $message_data = $st->fetchAll();
    $_SESSION[$to_name] = $message_data[0][0];

        foreach($data as $message) {
            if($from_name==$message["from_name"]){
                print '<div class="message_from">' . h($message["content"]) . '</div>';
            }else{
                print '<div class="message_to">' . h($message["content"]) .  '</div>';
            }
            
        }
    ?>
    </div>
    
  </body>
</html>
