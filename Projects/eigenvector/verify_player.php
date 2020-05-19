<?

session_start();

if ($_SESSION['authenticated'] != true) {
	die("Access denied");	
}

?>


<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title>Welcome</title>
  <body>
    <h2>Welcome</h2>
    <p>Only authenticated users can see this page.</p>
    <p><a href="logout.php">Logout</a></p>
	</body>
</html>