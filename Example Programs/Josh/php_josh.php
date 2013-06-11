<?php
require('mysql_connect.php'); //Require/include the connection file.

/******************************************
* Retreiving information from a database *
******************************************/
$query = "SELECT tName FROM Tutors"; //Define your query
$result = mysql_query($query); //Execute the query, this stores a table object in $result
if(!$result) die("Database access failed: ".mysql_error());

$tutorNames = array();

$rows = mysql_num_rows($result); //retreiving the number of rows in the table returned by the database.	
for($j = 0; $j < $rows; ++$j){
$name = mysql_result($result,$j, 'tName'); //Search the $result table object, and set column 'price' to $price.
array_push($tutorNames, $name);
echo $name;
}

//close the database when finished.
mysql_close($con);	
?>