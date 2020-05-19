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

// Just in case, I want to remember the user
session_start();

if (!$_SESSION['authenticated'])
{
        die("Access denied");	
}

// The submit error. Blank if there is no error
$error = false;

//  Only process if $_POST is set and Insert button was pressed 
if (empty($_POST) == false && $_POST['action'] == "Insert") {

	// Get data from posted form
	$q = addslashes($_POST['question']);
	$c1 = addslashes($_POST['choice1']);
	$c2 = addslashes($_POST['choice2']);
	$c3 = addslashes($_POST['choice3']);
	$c4 = addslashes($_POST['choice4']);
	$a = addslashes($_POST['answer']);

	// Make sure all the data is present
	if ($q!="" && $c1!="" && $c2!="" && $c3!="" && $c4!="" && $a!="") {	

		// Connect to datbase
		$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");				

		// Insert new question
		$sql = "INSERT INTO Questions_Kenway (question, choice1, choice2, choice3, choice4, answer) VALUES ('$q','$c1','$c2','$c3','$c4','$a')";
		$mysqli->query($sql);
		
		$mysqli->close();
				
	}
	else {
		// Some data is blank
		$error = true;
	}
}
	echo '		
      <h2>Make a Question</h2><br>
	  <form method="post" action="make_question2.php">
	  	
			<label>Question<br>
			<textarea name="question" rows="3"></textarea>
			</label><br>
			
			<label>Choice 1
			<br>
			<input type="text" name="choice1">
			</label>
			<input type="radio" name="answer" value="1">
			<br>
			
			<label>Choice 2
			<br>
			<input type="text" name="choice2">
			</label>
			<input type="radio" name="answer" value="2">
			<br>
			
			<label>Choice 3
			<br>
			<input type="text" name="choice3">
			</label>
			<input type="radio" name="answer" value="3">
			<br>
			
			<label>Choice 4
			<br>
			<input type="text" name="choice4">
			</label>
			<input type="radio" name="answer" value="4">
			<br>
						
			<input type="submit" name="action" value="Insert">
		
		</form>
        <h2><a href="my_home.php">Back to home</a></h2>
		';
		
		if ($error) echo 'All fields must be filled out';
?>
      </body>
</html>