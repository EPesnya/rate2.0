<?
	$hostname = "mysql.hostinger.ru";
	$username = "u553691087_evg";
	$password = "WKA0dhPXoO";
	$dbName = "u553691087_users";

	$mysqli = new mysqli($hostname, $username, $password, $dbName);

	$cur_query = mysqli_query($mysqli, "SELECT TOP 15 * FROM users");
	
	while ($selected_data = $cur_query->fetch_assoc()) {
		echo  $selected_data['first_name']." ".$selected_data['last_name']." ".$selected_data['rating'];
	}

	mysqli_close($mysqli);
?>