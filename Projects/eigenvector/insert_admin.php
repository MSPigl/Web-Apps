<?
    if ($_GET['key'] != 'firenze')
    {
        die("Access denied"); 
    }

    $usr = $_GET['username'];
    $pwd = $_GET['password'];
    $usertype = 'admin';
    $games = '0';
    $points = '0.0';
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);

    $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
				
	$sql = "INSERT INTO Users_Ezio (username, password, usertype, games, points) VALUES ('$usr','$pwd','$usertype','$games','$points')";
    $mysqli->query($sql);
    $mysqli->close();
	header('Location: http://s330819.sienasellbacks.com/eigenvector/index.php');
    die();

?>