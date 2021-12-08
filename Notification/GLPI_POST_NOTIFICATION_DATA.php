<?php
include_once'GLPI_CONNECT_DB.php';

	
	
	
	if(isset($_GET['user_id']) && !empty($_GET['user_id']) && isset($_GET['token']) && !empty($_GET['token'])){
		
		$user_id = $_GET['user_id'];
		$token = $_GET['token'];
		
  $sql ="INSERT INTO `notification_data`(`user_id`, `token`) VALUES ('$user_id','$token') ON DUPLICATE KEY UPDATE Token='$token',user_id='$user_id';";
			
	
	$result = mysqli_query($con,$sql);
	$response=array("message"=>"Success");
   echo json_encode($response);
	
   
} else {
    $response=array("message"=>"error");
   echo json_encode($response);

}
	
	
	
	
		

	?>
 