<?php
$host = "127.0.0.1"; //database location
$user = "homestead"; //database username
$pass = "secret"; //database password
$db_name = "alko"; //database name

$con=mysqli_connect($host,$user,$pass);
mysqli_select_db($con, $db_name); 

?>
