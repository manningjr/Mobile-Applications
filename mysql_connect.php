<?php

	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', 'root');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'MLC');
	
	
	//DEFINE ('DB_USER', 'mjohn');
	//DEFINE ('DB_PASSWORD', '');
	
	// Connect to the database
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	
	if (!$con)
	{
		die("A SQL error occured: " . mysql_error());
	}
	if (!mysql_select_db(DB_NAME))
	{
		die("A SQL error occured: " . mysql_error());
	}
	
?>