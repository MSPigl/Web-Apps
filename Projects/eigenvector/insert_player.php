<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Insert Player</title>
  <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link rel = "stylesheet" href="css/style.css">
  <body style="margin-left: 10px">
  
<?
    $action = $_POST['action'];

if ($action == "Insert Player" ) 
{

    $usr = $_POST['username'];
    $pwd = $_POST['password'];
    $usertype = 'normal';
    $games = '0';
    $points = '0.0';
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);

    $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
				
	$sql = "INSERT INTO Users_Ezio (username, password, usertype, games, points) VALUES ('$usr','$pwd','$usertype','$games','$points')";
	
	if ($mysqli->query($sql)) 
    {
      echo '<p>'.$usr. ' was inserted.</p>
            <p><a href="insert_player.php">Insert Another Player</a> or <a href="index.php">Login</a></p>';
      die();
    }
    elseif ($mysqli->errno == 1062) 
    {
        echo '<p>'.$usr. ' already exists.</p>
            <p><a href="insert_player.php">Insert Another Player</a></p>';
        die();
    }
    else 
    {
      die("Error ($mysqli->errno) $mysqli->error");
    } 
    $mysqli->close();
}
?>

      <form method="post" action="insert_player.php">
        <h2>Insert User</h2>
        <label>Username: <br><input type="text" name="username"></label><br>
        <label>Password: <br><input type="password" name="password"></label><br>
        <input type="submit" name="action" value="Insert Player"> 
      </form>
      <br><h2><a href = "index.php">Back to Login</a></h2>
  </body>
</html>