<?php

include 'GLPI_CONNECT_DB.php';

//request to get the ticket_actors to send them a notification
$sql='SELECT DISTINCT `users_id_tech`,`id`  FROM glpi_tickettasks where id = ( SELECT MAX(id) FROM glpi_tickettasks );';


	$result = mysqli_query($con,$sql);
$user = array();
$a = array();


//fetch the result in an array
if(mysqli_num_rows($result) > 0 ){

		foreach ($result as $r) {
			array_push($user, $r["users_id_tech"]);
			array_push($a, $r["id"]);
			
		}
	}
	
	include 'SendNotificationFunction.php';
	if ($user>0){
	include 'SendNotification_task_to_Users.php';
	}
	
?> 