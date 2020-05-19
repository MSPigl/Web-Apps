<? 
require_once("functions.php");

session_start();
if ($_SESSION['authenticated'] != true) {
  die("Access denied");	
}

print_html_header("Home");

echo '
		Welcome '.$_SESSION['username'].' to the Trivia game, use the menu above to play or to add questions.
	 ';

print_html_footer();
?>