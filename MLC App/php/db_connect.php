<?php

function db_connect() 
{
	//$server="mysql.mlc-info.net";
	//$username="ranvel";
	//$password="46hzShaz";
	//$dbName="mlcml";
	
	//Local server testing
	//$server="localhost";
	//$username="root";
	//$password="";
   	//$dbName="mlcml";
	
	//ylis server
	$server="localhost";
	$username="mjohn";
	$password="mjohn";
    $dbName="mjohn";
	$dbName="mlcml";
	
    $link=mysql_connect($server, $username, $password) or die (mysql_error());
	mysql_set_charset('utf8',$link);
	
	if (!@mysql_select_db($dbName, $link)) 
	{
		echo "<p>Error connecting to database. This is the error message:</p>"; 
     	echo "<p><strong>" . mysql_error() . "</strong></p>"; 
     	echo "Please Contact Your Systems Administrator with the details"; 
     	exit();
	}
	return $link;
}
	
function db_query($query, $db)
{
	$result = mysql_query($query, $db);
	if(!$result) 
	{
		die("SQL_QUERY_ERR: Query failed.\nFull query: $query");
	}
	return $result;
}

function db_result_to_array($result) 
{
   $res_array = array();
   $count=0;

   while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
   {
     $res_array[$count] = $row;
     $count++;
   }
   echo $res_array;
   return $res_array;
}

?>