<?
if($_GET['key']!="auditore") 
{
	die("Access denied");
}

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			

$sql = "CREATE TABLE Users_Ezio ( 
					username VARCHAR(64) NOT NULL, 
					password VARCHAR(64) NULL, 
					usertype VARCHAR(64) NOT NULL DEFAULT 'normal', 
					games INT NOT NULL DEFAULT '0', 
					points FLOAT NOT NULL DEFAULT '0.0', 
					PRIMARY KEY (username) 
				)";

$mysqli->query($sql);

$sql2 = "CREATE TABLE Questions_Kenway ( 
  id INT NOT NULL AUTO_INCREMENT,
  question VARCHAR(1024) NOT NULL,
  choice1 VARCHAR(1024) NOT NULL,
  choice2 VARCHAR(1024) NOT NULL,
  choice3 VARCHAR(1024) NOT NULL,
  choice4 VARCHAR(1024) NOT NULL,
  answer INT NOT NULL, 
  PRIMARY KEY (`id`) 
)";

$mysqli->query($sql2);

$mysqli->close();
?>