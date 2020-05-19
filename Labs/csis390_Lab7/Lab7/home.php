<? session_start();

if ($_SESSION['authenticated'] != true) {
	die("Access denied");	
}
?>

<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<title>Insert user</title>
	<body>
		<?
			echo '<p><a href="logout.php">Logout</a></p>';
			echo '<p><a href="insert_user.php">Add User</a></p>';
			echo '<p><a href="delete_user.php">Delete User</a></p>';
			echo '<p><a href="show_data.php">Show Data</a></p>';
		?>
	</body>
</html>