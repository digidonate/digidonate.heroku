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

    $act_sql = "select * from USERACT WHERE loginname = '$loginname' ORDER BY acttime DESC;";
    $act_result = $con->query($act_sql);
    echo "<h1>My History:</h1>";
		if ($act_result->num_rows > 0) {
			while($row = $act_result->fetch_assoc()) {
				if ($row["acttype"] == "search") {
					if ($row["actvalue"] != "ALL*") {
						echo "<p>Search keyword: ".$row["actvalue"]."</p>";
					}
					
				}
				else if ($row["acttype"] == "visusr" && $row["actvalue"] != $loginname) {
					$name_sql = "select * from USER WHERE loginname = '".$row["actvalue"]."'";
					$name_result = $con->query($name_sql);
					while($row1 = $name_result->fetch_assoc()) { 
					    echo "<p>Visit <a href='userpage.php?uloginname=".$row["actvalue"]."'>".$row1["username"]."</a> home page.</p>";
					}
					
				}
				else if ($row["acttype"] == "vispro") {
					echo "<p>Browse Project: <a href='displayproject.php?projectname=".$row["actvalue"]."'>".$row["actvalue"]."</a>.</p>";
				}
			}
		}
		echo "</table>";
		echo "<p id='back'><a href=\"./home.php\"><input type=\"button\" value=\"Back To Home\"></input></a></p>";
?>
</body>

<style>
       #back{
			position:fixed;
			right:100px;
			top:150px;
			}

</style>
</html>
