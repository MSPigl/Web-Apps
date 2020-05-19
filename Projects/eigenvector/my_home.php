<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Insert Player</title>
  <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link rel = "stylesheet" href="css/style.css">  
    <body>
    <? 
        session_start();

        if (!$_SESSION['authenticated'])
        {
	       die("Access denied");	
        }
        
        $usr = $_SESSION['username'];
        $_SESSION['questions_answered'] = 0;

        $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
        $result = $mysqli->query("SELECT usertype FROM Users_Ezio WHERE username='$usr'");
        $row = $result->fetch_row();
        $user_type = $row[0];
        $_SESSION['usertype'] = $user_type;

        echo 'Username: '.$usr.' | Usertype: '.$user_type;

        echo '<ul>';
        
        if ($user_type == 'admin')
        {
            echo '<li><a href="delete_question.php">Delete a Question<span style = "color: red"> - Admin Feature</span></a></li>';
            echo '<li><a href="delete_player.php">Delete a Player<span style = "color: red"> - Admin Feature</span></a></li>';
        }
        
        echo '<li><a href="play_trivia.php">Play Trivia</a></li>';
        echo '<li><a href="leaderboard.php">View the Leaderboard</a></li>';
        echo '<li><a href="make_question2.php">Submit a Question</a></li>';
        echo '<li><a href="logout_player.php">Logout</a></li>';
        echo '</ul>';
    ?>
    </body>
</html>