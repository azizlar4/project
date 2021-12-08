<?php


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
return $result;}


?>