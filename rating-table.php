<?

$hostname = "localhost";
$username = "epesnya";
$password = "qwerty123";
$dbName = "testbd";

$wi = $_POST['winner'];
$li = $_POST['loser'];

MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не могу создать соединение ");
@mysql_select_db("$dbName") or die("Не могу выбрать базу данных ");
mysql_set_charset("utf8"); 

$q1 = MYSQL_QUERY("SELECT * FROM users ORDER BY rating");
$t1 = mysql_fetch_assoc($q1);
$wr = $t1["rating"];

echo "<table width='100%'>";
echo "<tr><td>pole1</td><td>pole2</td><td>pole3</td><td>pole4</td></tr>";
while ($row=mysql_fetch_array($myrow)){
	$pole1=$row[0];
	$pole2=$row[1];
	$pole3=$row[2];
	$pole4=$row[3];
	 
	echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td></tr>";
}
echo "</table>";

MYSQL_CLOSE();
?>