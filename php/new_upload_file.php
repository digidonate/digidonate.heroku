<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<body>

<?php
echo "Uploading files...<br>";
$projectname=$_GET["projectname"];
if (isset($_FILES['file']) && !empty($_FILES['file']['tmp_name'])) {
	
	 // record the upload into the database

	  	$loginname = $_SESSION['loginname'];
	  	$matdes = $_POST["matdes"];
		$file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
      	$mysql_server_name="lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306"; //server name
		$mysql_username="bisz6nf2u5ymifre"; // username
		$mysql_password="ufcnqnkte0ofavy8"; // password
		$mysql_database="fizn07ewny2rctav"; // database name
		$con = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
		if ($con->connect_error) {
			die("Database connect_error: " . $con->connect_error);
		}

		$sql_new_upload_file = "INSERT INTO MATERIAL VALUES('$projectname', Now(), ?, '$file' );";
		/* Prepared statement, stage 1: prepare */
	    if (!($stmt = $con->prepare($sql_new_upload_file))) {
    		echo "Prepare failed: (" . $con->errno . ") " . $con->error;
		}

		//bind the variables to the stmt
		$stmt -> bind_param("s", $matdes);
		//execute
		$stmt ->execute();
}
else
{echo "Not set";}

       

		echo "<p><a href=\"./home.php\"><input type=\"button\" value=\"Back To Home\"></input></a></p>";
		

?>


</body>
</html>
