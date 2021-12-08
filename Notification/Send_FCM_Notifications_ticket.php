<?php

include 'GLPI_CONNECT_DB.php';

//request to get the ticket_actors to send them a notification
$sql='SELECT DISTINCT `users_id`,`tickets_id`  FROM glpi_tickets_users WHERE type IN (2 , 3) and users_id NOT IN (SELECT users_id FROM glpi_tickets_users WHERE type = 1 
and tickets_id = ( SELECT MAX(tickets_id) FROM glpi_tickets_users )) and tickets_id = ( SELECT MAX(tickets_id) FROM glpi_tickets_users );';


	$result = mysqli_query($con,$sql);
$user = array();
$a = array();


//fetch the result in an array
if(mysqli_num_rows($result) > 0 ){

		foreach ($result as $r) {
			array_push($user, $r["users_id"]);
			array_push($a, $r["tickets_id"]);
			
		}
	}
	
	include 'SendNotificationFunction.php';
	if ($user>0){
	include 'SendNotification_to_Users.php';
	}
	
?> 
 