<?

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			

$result = $mysqli->query("SHOW COLUMNS FROM SpiderTable");

echo '<table>';
echo '<tr>';
while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

$result = $mysqli->query("SELECT * FROM SpiderTable");

while ($row = $result->fetch_row()) {
	echo '<tr>';
	foreach ($row as $value) {
		echo '<td>'.$value.'</td>';
	}
	echo '</tr>';
}
echo '</table>';

echo '<p><a href="home.php">Back to Home</a></p>';
$result->close();

$mysqli->close();

?>