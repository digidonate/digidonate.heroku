<!DOCTYPE html>
<html>
	<body>
	<h1>User Home</h1>
	<?php
	    session_start();
		$mysql_server_name="lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306"; //server name
		$mysql_username="bisz6nf2u5ymifre"; // username
		$mysql_password="ufcnqnkte0ofavy8"; // password
		$mysql_database="fizn07ewny2rctav"; // database name
		$con = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		if ($con->connect_error) {
			die("Database connect_error: " . $con->connect_error);
		}
		//check if user already followed
		$follow_sql = "INSERT INTO `FOLLOW` VALUES ('".$_SESSION["loginname"]."','".$_GET['uloginname']."')";
		$follow_result = $con->query($follow_sql);
		echo "<p><a href='userpage.php?uloginname=".$_GET['uloginname']."'><input type=\"button\" value=\"Back\"></input></a></p>";
		//echo $_GET['uloginname'];
		
		
	?>
	</body>
</html>