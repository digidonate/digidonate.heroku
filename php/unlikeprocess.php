<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<body>

<?php
    $mysql_server_name="lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306"; //server name
		$mysql_username="bisz6nf2u5ymifre"; // username
		$mysql_password="ufcnqnkte0ofavy8"; // password
		$mysql_database="fizn07ewny2rctav"; // database name
	$con = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
	if ($con->connect_error) {
		die("Database connect_error: " . $con->connect_error);
		}
	$like_sql = "DELETE FROM `LIKE` WHERE loginname='".$_SESSION['loginname']."' AND projectname='".$_GET['projectname']."'";
	//echo $like_sql;
	mysqli_query($con, $like_sql);
	echo "<p><a href='displayproject.php?projectname=".$_GET['projectname']."'>Back To Project!</a></p>";

?>

</body>
</html>
