<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_hostname = 'localhost:3306';
$db_database = 'world';
$db_username = 'worlduser'; 
$db_password = 'worlduser'; 

include 'functions.php';

connect($db_hostname, $db_database, $db_username, $db_password);

$results = select("SELECT * FROM Country");

?>

<html>
	<head></head>
	<body>
		
		<ul>
			<?php
				foreach ($results as $row) 
				{
				    echo "<li>" . $row[1] . "</li>";
				}
			?>
		</ul>

	</body>
</html>