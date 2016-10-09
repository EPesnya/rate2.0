<?

$hostname = "localhost";
$username = "epesnya";
$password = "qwerty123";
$dbName = "testbd";

$response = $_POST['resp'];
$userstable = "users";

$mysqli = new mysqli($hostname, $username, $password, $dbName);

for($i = 0; $i < count($response); $i++)
{
	$cur_id = $response[$i]["uid"];
	$cur_query = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id=$cur_id");
	$selected_data = $cur_query->fetch_assoc();
	if($cur_query->num_rows === 0)
	{
		$id = $response[$i]["uid"];
		$first_name = $response[$i]['first_name'];
		$last_name = $response[$i]['last_name'];
		$photo = $response[$i]['photo_400_orig'];
		$rating = 1400;
		$domain = $response[$i]['domain'];
		$query = "INSERT INTO users (user_id, first_name, last_name, photo, rating, domain) VALUES('$id','$first_name','$last_name','$photo','$rating','$domain')";
		$result = mysqli_query($mysqli, $query);
		echo "User inserted!";
	}
}

mysqli_close($mysqli);
?>