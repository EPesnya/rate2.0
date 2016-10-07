<?

$hostname = "mysql.hostinger.ru";
$username = "u553691087_evg";
$password = "WKA0dhPXoO";
$dbName = "u553691087_users";

$wi = $_POST['winner'];
$li = $_POST['loser'];

MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не могу создать соединение ");
@mysql_select_db("$dbName") or die("Не могу выбрать базу данных ");
mysql_set_charset("utf8"); 

$q1 = MYSQL_QUERY("SELECT * FROM users WHERE user_id=$wi");
$t1 = mysql_fetch_assoc($q1);
$wr = $t1["rating"];
$q2 = MYSQL_QUERY("SELECT * FROM users WHERE user_id=$li");
$t2 = mysql_fetch_assoc($q1);
$lr = $t2["rating"];


$ew = 1 / (float)(1 + pow(10, (abs($wr - $lr) / 400.0)));
$kw = 20;
if ($wr > 2400) {
	$kw = 10;
}
$nrw = $wr + $kw * (1 - $ew);
$el = 1 / (float)(1 + pow(10, (abs($lr - $wr) / 400.0)));
$kl = 20;
if ($lr > 2400) {
	$kl = 10;
}
$nrl = $lr + $kl * (0 - $el);

MYSQL_QUERY("UPDATE users SET rating='$nrw' WHERE user_id=$wi");
MYSQL_QUERY("UPDATE users SET rating='$nrl' WHERE user_id=$li");

MYSQL_CLOSE();
?>