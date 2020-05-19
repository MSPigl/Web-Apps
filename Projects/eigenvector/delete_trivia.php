<?
	$id = file_get_contents('php://input');
	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			
	$mysqli->query("DELETE FROM Questions_Kenway WHERE id=$id");
	$mysqli->close();
	echo "q".$id;
?>