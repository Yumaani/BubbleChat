<?php
session_start();
ini_set('display_errors', "On");
error_reporting(E_ALL);
?>
<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  if (isset($_GET["content"])) {
    $content = h($_GET["content"]);
    
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
    $st = $pdo->prepare("INSERT INTO message(from_name, to_name, content ) VALUES(?, ?, ?)");
    $st->execute(array($from_name, $to_name,$content));
    
    header( "Location: chattest.php" ) ;
	exit ;
  }
?>