<?

$hostname = "mysql.hostinger.ru";
$username = "u553691087_evg";
$password = "WKA0dhPXoO";
$dbName = "u553691087_users";

$wi = $_POST["winner"];
$li = $_POST["loser"];

$mysqli = new mysqli($hostname, $username, $password, $dbName);

$q1 = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id=$wi");
$t1 = $q1->fetch_assoc();
$wr = $t1["rating"];
$q2 = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id=$li");
$t2 = $q2->fetch_assoc();
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

mysqli_query($mysqli, "UPDATE users SET rating='$nrw' WHERE user_id=$wi");
mysqli_query($mysqli, "UPDATE users SET rating='$nrl' WHERE user_id=$li");

mysqli_close($mysqli);
?>