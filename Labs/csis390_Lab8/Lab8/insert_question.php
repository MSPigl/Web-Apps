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
    require_once("functions.php");
      
	$q = $_POST['question'];
	$c1 = $_POST['choice1'];
	$c2 = $_POST['choice2'];
	$c3 = $_POST['choice3'];
	$c4 = $_POST['choice4'];
	$a = $_POST['answer'];
	
	$action = $_POST['action'];
	
	if ($action == 'Insert')
	{
		if ($c1 != "" && $c2 != "" && $c3 != "" && $c4 != "" && $a != "")
		{			
			$mysqli = db_connect();			
			
			$sql = "INSERT INTO Questions50110 (question, choice1, choice2, choice3, choice4, answer) VALUES ('$q','$c1','$c2','$c3','$c4','$a')";
            
            $mysqli->query($sql);
		
			$result = $mysqli->query("SHOW COLUMNS FROM Questions50110");

			echo '<table>';
			echo '<tr>';
			while ($row = $result->fetch_row()) {
				echo '<th>'.$row[0]."</th>";
			}
			echo '</tr>';

			$result->close();

			$result = $mysqli->query("SELECT * FROM Questions50110");

			while ($row = $result->fetch_row()) {
				echo '<tr>';
				foreach ($row as $value) {
					echo '<td>'.$value.'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
            
            echo '<a href="http://s330819.sienasellbacks.com/Lab8/insert_question.php">Insert Another Question</a>';

			$result->close();

			$mysqli->close();
		}
	}
	
	else {
		echo '
			<form method="post" action="insert_question.php">
		<label for="question">Question</label><br>
		<input type="text" name="question" id="question" value="" size="60"><br>
		
		<label for="choice1">Choice 1</label><br>
		<input type="text" name="choice1" id="choice1" value="" size="60">
		<input type = "radio" name="answer" value="1"><br>
		
		<label for="choice2">Choice 2</label><br>
		<input type="text" name="choice2" id="choice2" value="" size="60">
		<input type = "radio" name="answer" value="2"><br>
		
		<label for="choice3">Choice 3</label><br>
		<input type="text" name="choice3" id="choice3" value="" size="60">
		<input type = "radio" name="answer" value="3"><br>
		
		<label for="choice4">Choice 4</label><br>
		<input type="text" name="choice4" id="choice4" value="" size="60">
		<input type = "radio" name="answer" value="4"><br>
		
		<input type = "submit" name="action" value="Insert">
	</form>
	
	';
		
		
	}
	
?>
  </body>
</html>