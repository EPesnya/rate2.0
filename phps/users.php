<?

$hostname = "localhost";
$username = "u553691087_evg";
$password = "WKA0dhPXoO";
$dbName = "u553691087_users";

/* Таблица MySQL, в которой хранятся данные */
$userstable = "clients";

/* создать соединение */
MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не могу создать соединение ");

@mysql_select_db("$dbName") or die("Не могу выбрать базу данных "); 

MYSQL_CLOSE();
?>