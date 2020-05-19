<? 

session_start();

$error = false;

$action = $_POST['action'];

if ($action == "Login" ) {

  $usr = $_POST['username'];
  $submitted_password = $_POST['password'];


	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			
	
	$result = $mysqli->query("SELECT password, points, games FROM Users_Ezio WHERE username='$usr'");
	$row = $result->fetch_row();
	$stored_password = $row[0];
	
	$mysqli->close(); 
	
	if ($stored_password != null && password_verify($submitted_password,$stored_password)) {
	   $_SESSION['authenticated'] = true;
       $_SESSION['username'] = $usr;
       $_SESSION['points'] = $row[1];
       $_SESSION['games'] = $row[2];        
	   header("Location: http://s330819.sienasellbacks.com/eigenvector/my_home.php");
	   die();
	}
	else 
    {
		 $error = true;
	}

}
?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel = "stylesheet" href="css/style.css">
  <body style="margin-left: 10px">
  <form method="post" action="index.php">
    <h2>Login</h2>
    <label>Username: <br><input type="text" name="username"></label><br>
    <label>Password: <br><input type="password" name="password"></label><br>
    <input type="submit" name="action" value="Login"> 
    <p>Don't have a trivia account yet? <a href="insert_player.php"> Make one!</a></p>
    <? if($error) echo '<p style="color: red;">Login failed</p>'; ?>
  </form>
	</body>
</html>