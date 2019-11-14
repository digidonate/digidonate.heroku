<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php


    $loginname = $_SESSION['loginname'];

    $mysql_server_name="lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306"; //server name
		$mysql_username="bisz6nf2u5ymifre"; // username
		$mysql_password="ufcnqnkte0ofavy8"; // password
		$mysql_database="fizn07ewny2rctav"; // database name
    $con = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
    if ($con->connect_error) {
	    die("Database connect_error: " . $con->connect_error);
	}

    $charge_sql = "select * from CHARGE WHERE loginname = '$loginname';";
    $charge_result = $con->query($charge_sql);
    echo "<h1>My Charge:</h1>";
		echo "<table id='mychar'><tr><th>Project</th><th>Charge Time</th><th>Amount</th></tr>";
		if ($charge_result->num_rows > 0) {
			while($row = $charge_result->fetch_assoc()) {
				echo "<tr>";
				echo "<td><p><a href='displayproject.php?projectname=".$row["projectname"]."'>".$row["projectname"]."</a></p></td>";
				echo "<td><p>".$row["chargetime"]."</p></td>";
				echo "<td><p>".$row["totalamount"]."</p></td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		echo "<p><a href=\"./home.php\"><input type=\"button\" value=\"Back To Home\"></input></a></p>";
?>
</body>
</html>
