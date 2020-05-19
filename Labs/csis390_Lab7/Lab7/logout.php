<?

session_start();

session_destroy();

unset($_SESSION);

header("Location: http://s330819.sienasellbacks.com/Lab7/login.php");

die("Session Destroyed");


?>