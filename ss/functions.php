<?php 
$db_server = NULL;
$error = NULL;

function connect($db_hostname, $db_database, $db_username, $db_password)
{
	global $error, $db_server;

	$db_server = mysql_connect($db_hostname, $db_username, $db_password); 
	if ($db_server == FALSE) 
	{
		$error = "Unable to connect to MySQL: " . mysql_error();
	}
	else
	{
		if (mysql_select_db($db_database) == FALSE)
		{
			$error = "Unable to select MySQL DB: " . mysql_error();
		}		
	}
}

function select($query)
{
	global $error;
		
	$result = mysql_query($query); 

	if ($result == FALSE)
	{
		$error = "MySQL query error: " . mysql_error();
	}
	else
	{
		$rows = mysql_num_rows($result); 
		for ($j = 0; $j < $rows; $j++) 
		{ 
			$row = mysql_fetch_row($result);
			$results[] = $row;
		}
	}	
	return $results;
}

function insert($query)
{
	global $error;
		
	$result = mysql_query($query); 

	if ($result == FALSE)
	{
		$error = "MySQL query error: " . mysql_error();
	}
	return;
}

function disconnect()
{
	global $db_server;
	mysql_close($db_server);
}
?>