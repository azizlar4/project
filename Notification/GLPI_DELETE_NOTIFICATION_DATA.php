<?php
include_once'GLPI_CONNECT_DB.php';

	
	if( isset($_GET['token']) && !empty($_GET['token'])){
		
		
		$token = $_GET['token'];
		
			$sql ="DELETE FROM `notification_data` WHERE token='$token'";
			
	

			
	
	$result = mysqli_query($con,$sql);
	$response=array("message"=>"Success");
   echo json_encode($response);
	
   
} else {
    $response=array("message"=>"error");
   echo json_encode($response);

}


	
	

	

 
   
?>