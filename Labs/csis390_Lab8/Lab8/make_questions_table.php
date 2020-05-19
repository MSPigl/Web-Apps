<?
if($_GET['key']!="spidey11") {
	die("Access denied");
}

require_once("functions.php");

$mysqli = db_connect();			
$sql = "
CREATE TABLE Questions50110 ( 
	id INT NOT NULL AUTO_INCREMENT,
	question VARCHAR(1024) NOT NULL,
	choice1 VARCHAR(1024) NOT NULL,
	choice2 VARCHAR(1024) NOT NULL,
	choice3 VARCHAR(1024) NOT NULL,
	choice4 VARCHAR(1024) NOT NULL,
	answer INT NOT NULL, 
	PRIMARY KEY (`spider`) 
)";

$result = $mysqli->query($sql);
$result->close();
$mysqli->close();
?>