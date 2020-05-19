<? 
    session_start()   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add Question</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    </head>
    <body style="margin-left: 10px">
        <?
            if (!$_SESSION['authenticated'])
            {   
                die("Access denied");	
            }

            if ($_SESSION['questions_answered'] == 0)
            {
                $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");

                $sql = "SELECT question, choice1, choice2, choice3, choice4, answer FROM Questions_Kenway ORDER BY RAND() LIMIT 10";
                
                $result = $mysqli->query($sql);
                
                $questions_array = array();
                
                while ($row = $result->fetch_row())
                {
                    array_push($questions_array, $row);
                }
                
                $result->close();
                $mysqli->close();
                
                $_SESSION['questions'] = $questions_array;
            }
            if ($_POST['next'] == 'Next')
            {
                $_SESSION['questions_answered']++;
            }

            if ($_POST['answer'] == $_SESSION['correct'])
            {        
                $_SESSION['points']++;
            }

            if ($_SESSION['questions_answered'] == 10)
            {
                $_SESSION['games']++;
                $games = $_SESSION['games'];
                $points = $_SESSION['points'];
                $usr = $_SESSION['username'];
                $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
                $sql = "UPDATE Users_Ezio SET games= $games, points = $points WHERE username = '$usr'";
                $mysqli->query($sql);
                header("Location: http://s330819.sienasellbacks.com/eigenvector/my_home.php");
                die();
            }

            if ($_SESSION['questions_answered'] > 0)
            {
                if ($_POST['answer'] == $_SESSION['correct'])
                {
                    echo '<h3 style = "color: green">Correct!</h3><br>';    
                }
                else
                {
                   echo '<h3 style = "color: red">Incorrect!</h3><br>'; 
                }
            }
            
            $question_index = $_SESSION['questions_answered'] ;
            $current_question =  $_SESSION['questions'][$question_index];

            $q = $current_question[0];
            $c1 = $current_question[1];
            $c2 = $current_question[2];
            $c3 = $current_question[3];
            $c4 = $current_question[4];
            $a = $current_question[5];

            echo '<form method="post" action="play_trivia.php">';
            echo '
                    <label>'.$q.'<br>
                    </label><br>
                ';
            
            for ($i = 1; $i <= 4; $i++)
            {
                echo '<label>';
                echo $current_question[$i];
                if ($i == $a)
                {
                    echo '<input style = "margin-left: 10px" type="radio" name="answer" value = "'.$i.'" id = "correct">';
                    $_SESSION['correct'] = $i;
                }
                else
                {
                    echo '<input style = "margin-left: 10px" type="radio" name="answer" value = "'.$i.'">';
                }
                echo '</label><br>';
            }
            echo '<input style = "margin-top: 10px" type="submit" name="next" value="Next" id="nxt"><br>
                      <br><h2><a href = "my_home.php">Back to Home</a></h2>
                      </form>
                    ';

            echo 'Questions answered: '.$_SESSION['questions_answered'];
            echo '<br>Number of points: '.$_SESSION['points'];
        ?>
    </body>
</html>