 <?php

include_once'GLPI_CONNECT_DB.php';
function sendNotif ($to, $notif){

    $feilds = array('to'=>$to, 'notification'=>$notif);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($feilds) );
    
    $headers = array();
    $headers[] = 'Authorization: Key= AAAA5qQSy78:APA91bHLgg7fyiQDQYTNVDTYNwjSekh_aAQ9VTT6wz8erBrNbpsBHjaxq5cNaEOX4OCRWccopPiqy2eam_HN3aW71wInlsqBFuPm3fCiCFii1eIgQ6JN5cf_8jM9kGXPkCsWKiq9G7OW';
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
	return $result;
}


	$sql = " Select Token From notification_data where user_id='2';";

	$result = mysqli_query($con,$sql);
	$tokens = array();


	if(mysqli_num_rows($result) > 0 ){

		while ($row = mysqli_fetch_assoc($result)) {
			array_push($tokens, $row["Token"]);
		}
	}

	mysqli_close($con);


$notification = array(
    'title' => "New ticket!!",
    'body' => "A new tournament is ready, Join now or miss out"
);

for ($x = 0; $x < count($tokens); $x++) {
  sendNotif($tokens[$x], $notification);
}



?>