<?php
//for localhost
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');

//for non local servers (ylis.gcsu.edu)
//DEFINE ('DB_USER', 'sjoshua');
//DEFINE ('DB_PASSWORD', 'sjoshua');

//Define your host name and database name
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'test');

//Connect to the database host.
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);     
if (!$con) {
    die("A SQL error occurred: " . mysql_error());
}
if (!mysql_select_db(DB_NAME)) {
    die("A SQL error occurred: " . mysql_error());
}

//Not sure what this is
//mysql_select_db(DB_NAME, $con);
?>