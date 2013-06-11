<?php
require('../../JoshuaTutor/files/mysql_connect.php'); //Require/include the connection file.

/******************************************
 * Retreiving information from a database *
 ******************************************/
$query = "SELECT price FROM pizzas WHERE size='$size' AND crust='$crust'"; //Define your query
$result = mysql_query($query); //Execute the query, this stores a table object in $result
if(!$result) die("Database access failed: ".mysql_error());

$rows = mysql_num_rows($result); //retreiving the number of rows in the table returned by the database.				
for($j = 0; $j < $rows; ++$j){
	$price = mysql_result($result,$j, 'price'); //Search the $result table object, and set column 'price' to $price.
}

/************************************
 * Adding information to a database *
 ************************************/
$query = "INSERT INTO orders (date, price, numPizzas) VALUES (CURDATE(), $totalPrice, $numPizzas)"; //Define the query
mysql_query($query); //execute the query

//close the database when finished.
mysql_close($con);				
?>