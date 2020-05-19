<? 
require_once("functions.php");

session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}
else
{
	if ($_SESSION['usertype'] != "admin")
	{
		die("Access denied, you are not an admin");
	}
}

print_html_header("Delete Question");


//  Only process if $_GET is not empty and an id is present in the URL
if (empty($_GET) == false && $_GET['id'] != "") {
	$id = $_GET['id'];
	$mysqli = db_connect();				
	$mysqli->query("DELETE FROM Questions WHERE id=$id");
	$mysqli->close();
}

// Always print the list table of questions
$mysqli = db_connect();				
$result = $mysqli->query("SELECT question, choice1, choice2, choice3, choice4, answer, id FROM Questions");
while ($row = $result->fetch_array())
{
	echo '
			<div class="card">
			<div class="card-block">
				<h4 class="card-title">'.$row[0].'</h4>
			</div>
			<ul class="list-group list-group-flush">';
			
			
				//<li class="list-group-item ">'.$row[1].'</li>
				//<li class="list-group-item ">'.$row[2].'</li>
				//<li class="list-group-item active">'.$row[3].'</li>
				//<li class="list-group-item ">'.$row[4].'</li>
				for ($i = 1; $i <= 5; $i++)
				{
					if ($row[$i] == $row[5])
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

print_html_footer();
?>