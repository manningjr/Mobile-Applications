<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="default" />
        <meta name="viewport" content="user-scalable=no, width=device-width"/>
     	<link href="DatabaseConnectTest.css" rel="stylesheet" type="text/css">
        
        <h1>Database Connect Sample</h1>
   	</head>
            
   	<body>
       	<ul>
         	<li>
            	<?php
					include('mysql_connect.php');
					
					$query = "SELECT tName,tEmail FROM Tutors";
					$result = mysql_query($query);
					
					if(!$result)
					{
						die("Database access failed: " .mysql_error());
					}
					
					echo'<table border="1" width=100% style="font-size:16px; 	text-align:center;">';	
					echo'<th><label for="tName">Name</label></th>';
					echo'<th><label for="tEmail">Email</label></th>';	
					
					while ($row=mysql_fetch_array($result)) 
					{				
						
						echo'<tr>';
								$tName="$row[tName]";
								$tEmail="$row[tEmail]";
							
							echo"<td>". $tName ."</td>";
							echo"<td>". $tEmail ."</td>";
						echo'</tr>';
					echo'</br>';
					}
				?>
           	</li>
       	</ul>

	</body>
</html>