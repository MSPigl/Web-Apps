<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Leaderboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?
    session_start();

    if (!$_SESSION['authenticated'])
    {
        die("Access denied");	
    }
    
    $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");				
    $result = $mysqli->query("SELECT username, points, games FROM Users_Ezio ORDER BY points DESC");

    echo '<h2>Leaderboard</h2>';
    while ($row = $result->fetch_array())
    {
	   echo '
			<div class="card">
			<div class="card-block">
				<h4 class="card-title">'.$row[0].'</h4>
			</div>
			<ul class="list-group list-group-flush">';
        echo'<li class="list-group-item ">Total Points: '.$row[1].'</li>';
        echo'<li class="list-group-item ">Total Games: '.$row[2].'</li>';
        echo '</ul> </div>';
    }
    $result->close();
    $mysqli->close();
?>
    <br><h2><a href = "my_home.php">Back to Home</a></h2>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    </body>
</html>