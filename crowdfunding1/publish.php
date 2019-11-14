<!DOCTYPE html>
<html>
<head>
	<title>Crowdfunding: Publishing Project</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>li {list-style: none;}</style>
</head>
<body>
	<h2>Publishing Project</h2>
	<form name="display" action="index.php" method="GET">
		<button type="submit">Return to Homepage</button>
	</form>
	<div class="member-dashboard">
		<?php
			session_start();
			if ($_COOKIE[userid] != NULL && $_SESSION[userid] == NULL) {
				$_SESSION[userid] = $_COOKIE[userid];
			}
			if ($_SESSION[userid] == NULL) {
				echo "You have not logged in yet";
			}
			else {
				echo "You have logged in as <i>" . $_SESSION[userid] . "</i>";
			}
		?>
	</div>
	<br/>
	<?php
		define('DB_SERVER', 'lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306');
define('DB_USERNAME', 'bisz6nf2u5ymifre');
define('DB_PASSWORD', 'ufcnqnkte0ofavy8');
define('DB_NAME', 'fizn07ewny2rctav');
 
/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		// Connect to the database. Please change the password in the following line accordingly
		//$db = mysqli_connect("host=localhost port=5432 dbname=postgres user=postgres password=000000");
		date_default_timezone_set("Asia/Singapore");
		$current_date = date("Y-m-d");
		if ($_SESSION[userid] == NULL) {
			echo "Please login to publish a project.";
		}
		else {
	?>
	<form name="display" action="publish.php" method="POST">
		<ul>
			<div class="container">
				<li><label for="title">Title</label></li>
				<li><input type="text" placeholder="Enter Project Title" name="title" required></li>
				<li><label for="desc">Description</label></li>
				<li><input type="text" placeholder="Enter Description" name="desc" required></li>
				<li><label for="dura">Duration (Days)</label></li>
				<li><input type="number" placeholder="Enter Funding Duration" name="dura" required></li>
				<li><label for="cat">Category</label></li>
				<li><input type="text" placeholder="Enter Category" name="cat" required></li>
				<li><label for="total">Total Amount (USD)</label></li>
				<li><input type="number" placeholder="Enter Total Amount" name="total" required></li>
			</div>
			<div class="clearfix">
				<button type="reset" class="cancelbtn">Clear</button>
				<button type="submit" class="publishbtn" name="pub">Confirm Pulish</button>
			</div>
		</ul>
	</form>
	<br/>
	<?php
		}
		if (isset($_POST[pub])) {
			$id = mysqli_fetch_assoc(mysqli_query("SELECT COUNT(*) AS num FROM publish_projects"))[num] + 1;
			$result = mysqli_query($db, "INSERT INTO publish_projects VALUES ('$_SESSION[userid]', '$id', '$_POST[title]', '$_POST[desc]', '$current_date', '$_POST[dura]', '$_POST[cat]', '$_POST[total]')");
			if (!$result) {
				echo "<p>Invalid input(s)!</p>";
			}
			else {
				echo "<p>Publish successful!</p>";
				echo "<p>Your Project ID is ". $id .".</p>";
			}
		}
	?>
</body>
</html>
