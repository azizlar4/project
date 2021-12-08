<?php
$dbServername = "localhost";
$dbUsername= "root";
$dbPassword = "";
$dbName= "glpi";

$con = mysqli_connect ($dbServername, $dbUsername, $dbPassword, $dbName) or die ("something is worng !!");
$con->set_charset('utf8mb4');



?>
