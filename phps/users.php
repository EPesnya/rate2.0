<?

$hostname = "localhost";
$username = "epesnya";
$password = "qwerty123";
$dbName = "testbd";

$id = $_POST["id"];
$image = $_POST["photo"];
/* Таблица MySQL, в которой хранятся данные */
$userstable = "users";

/* создать соединение */
MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не могу создать соединение ");

@mysql_select_db("$dbName") or die("Не могу выбрать базу данных "); 



$query = "INSERT INTO $userstable VALUES('$id','','$image','$id','')";
$result = MYSQL_QUERY($query);
PRINT "yes";

MYSQL_CLOSE();
?>