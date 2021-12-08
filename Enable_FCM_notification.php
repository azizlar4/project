<?php
include 'C:/xampp/htdocs/glpi/GLPI_CONNECT_DB.php';

if(isset($_GET['token']) && !empty($_GET['token'])){
	$token = $_GET['token'];
	
$sql = " UPDATE notification_data SET active=TRUE WHERE token='$token'";
	$result = mysqli_query($con,$sql);
	$tokens = array();


	if(mysqli_affected_rows($con) > 0 ){
		$response=array("message"=>"Success");
   echo json_encode($response);
	
	
	
	}
	else {
		$response=array("error"=>"0 row updated !");
   echo json_encode($response);
	}
}
else{$response=array("error"=>"token missing !!");
   echo json_encode($response);}


?> 
 
