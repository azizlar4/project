<?php

		
	foreach($user as $u){
$sql = " Select Token, active From notification_data where user_id='$u';";
	$result = mysqli_query($con,$sql);
	$tokens = array();


	if(mysqli_num_rows($result) > 0 ){
	
		while ($row = mysqli_fetch_assoc($result)) {
			if($row["active"]!=0)
			array_push($tokens, $row["Token"]);
		
		}
	}

$notification = array(
    'title' => "New task for you '$a[0]'",
    'body' => "there is a new task for you!!"
);

foreach ($tokens as $t ) {
  sendNotif($t, $notification);
}
		}
		mysqli_close($con);
?> 
 
