<?
if($_GET['key']!="spidey11") {
	die("Access denied");
}

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			

$sql = "CREATE TABLE SpiderTable ( 
					username VARCHAR(64) NOT NULL, 
					password VARCHAR(64) NULL, 
					usertype VARCHAR(64) NOT NULL DEFAULT 'normal', 
					games INT NOT NULL DEFAULT '0', 
					points FLOAT NOT NULL DEFAULT '0.0', 
					PRIMARY KEY (username) 
				)";

$mysqli->query($sql);
$mysqli->close();
?>