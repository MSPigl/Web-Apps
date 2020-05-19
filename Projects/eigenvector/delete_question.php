<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete Question</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Delete Question</h2>
<?
    session_start();

    if (!$_SESSION['authenticated'])
    {
        die("Access denied");	
    }
    else
    {
	   if ($_SESSION['usertype'] != "admin")
	   {
		  die("Access denied, you are not an admin");
	   }
    }
    
    $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");				
    $result = $mysqli->query("SELECT question, choice1, choice2, choice3, choice4, answer, id FROM Questions_Kenway");

    while ($row = $result->fetch_array())
    {
	   echo '
			<div class="card">
			<div class="card-block">
				<h4 class="card-title">'.$row[0].'</h4>
			</div>
			<ul class="list-group list-group-flush">';
			
			
        for ($i = 1; $i <= 4; $i++)
        {
            if ($i == $row[5])
            {
                echo'<li class="list-group-item active">'.$row[$i].'</li>';
            }
            else
            {
                echo'<li class="list-group-item ">'.$row[$i].'</li>';
            }
        }		
			
        echo '</ul>
                <div class="card-block">
				<input type="button" class="btn btn-danger btn-delete" id="q'.$row[6].'" value="Delete">
				</div>
			</div>
		 ';
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