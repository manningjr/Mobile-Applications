<?php
	include ('db_connect.php');
	
	$link=db_connect();

	$sql = "SELECT tName, tEmail, tID FROM  tutors ";
	
	$result = db_query($sql,$link);

	
	//Create JSON encoded Array
	$myArray = array();
	while ($row=mysql_fetch_array($result,MYSQL_ASSOC))
	{
		//Create a name/value array for each field
		$d = array('tName' => $row['tName'] ,
				   'tEmail' => $row['tEmail'],
				   'tID'=> $row['tID']);
		array_push($myArray,$d);				
	}
	
	$newArray = array('tutors' =>$myArray);
	
	$output= json_encode($newArray);
	echo $output;
	
	mysql_close($link);
?>