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

$q1 = MYSQL_QUERY("SELECT * FROM users WHERE user_id=$wi");
$t1 = mysql_fetch_assoc($q1);
$wr = $t1["rating"];
$q2 = MYSQL_QUERY("SELECT * FROM users WHERE user_id=$li");
$t2 = mysql_fetch_assoc($q1);
$lr = $t2["rating"];

$ew = 1 / (1 + pow(10, (($wr - $lr) / 400.0)));
$nrw = $wr + 20 * (1 - $ew);
$el = 1 / (1 + pow(10, (($lr - $wr) / 400.0)));
$nrl = $wr + 20 * (0 - $el);

MYSQL_QUERY("UPDATE users SET rating='$nrw' WHERE user_id=$wi");
MYSQL_QUERY("UPDATE users SET rating='$nrl' WHERE user_id=$li");

MYSQL_CLOSE();
?>