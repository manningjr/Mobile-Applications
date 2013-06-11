<?php
	include ('db_connect.php');
	
	$link=db_connect();

	$sql = "SELECT node.title,
				field_data_field_media_type.field_media_type_value".
				
			"FROM ".
			"node,
				field_data_field_media_type
				
			WHERE node.title LIKE 'Men%'
			AND node.nid = field_data_field_media_type.entity_id";
	
	$result = db_query($sql,$link);

	
	//Create JSON encoded Array
	$myArray = array();
	while ($row=mysql_fetch_array($result,MYSQL_ASSOC))
	{
		//Create a name/value array for each field
		$d = array('title' => $row['title'],
					'mediaType' => $row['field_media_type_value']);
		array_push($myArray,$d);				
	}
	
	$newArray = array('Media' =>$myArray);
	
	$output= json_encode($newArray);
	echo $output;
	
	mysql_close($link);
?>