<?
session_start();

session_destroy();

unset($_SESSION);

header("Location: http://s330819.sienasellbacks.com/eigenvector/index.php");

die("Session Destroyed");
?>