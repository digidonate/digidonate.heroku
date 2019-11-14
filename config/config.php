<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)fdfggfg */
define('DB_NAME', 'fizn07ewny2rctav');
define('DB_USER', 'bisz6nf2u5ymifre');
define('DB_PASSWORD', 'ufcnqnkte0ofavy8');
define('DB_HOST', 'lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?> 


