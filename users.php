<?

$hostname = "localhost";
$username = "epesnya";
$password = "qwerty123";
$dbName = "testbd";

$response = $_POST['resp'];
$userstable = "users";

MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не могу создать соединение ");
@mysql_select_db("$dbName") or die("Не могу выбрать базу данных ");
mysql_set_charset("utf8"); 

for($i = 0; $i < count($response); $i++)
{
	$cur_id = $response[$i]["uid"];
	$cur_query = MYSQL_QUERY("SELECT * FROM users WHERE user_id=$cur_id") or die(mysql_error());
	$selected_data = mysql_fetch_assoc($cur_query);
	if(MYSQL_NUMROWS($cur_query) == 0)
	{
		$id = $response[$i]["uid"];
		$first_name = $response[$i]['first_name'];
		$last_name = $response[$i]['last_name'];
		$photo = $response[$i]['photo_400_orig'];
		$rating = 1400;
		$domain = $response[$i]['domain'];
		echo $id,$first_name,$last_name,$photo,$rating,$domain + '\n';
		$query = "INSERT INTO users (user_id, first_name, last_name, photo, rating, domain) VALUES('$id','$first_name','$last_name','$photo','$rating','$domain')";
		$result = MYSQL_QUERY($query) or die(mysql_error());
		echo "User inserted!";
	}
}

MYSQL_CLOSE();
?>