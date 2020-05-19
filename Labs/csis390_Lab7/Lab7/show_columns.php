<?

$sql = "SHOW COLUMNS FROM SpiderTable";

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			
$result = $mysqli->query($sql);
$mysqli->close();

echo '<table>';
echo '<tr><th>field name</th><th>data type</th><th>null?</th><th>index</th><th>default value</th></tr>';
while ($row = $result->fetch_row()) {
	echo '<tr>';
	foreach ($row as $value) {
		echo '<td>'.$value.'</td>';
	}
	echo '</tr>';
}
echo '</table>';

?>