<?
require_once "db_var.php";

mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
mysql_select_db($dbName) or die (mysql_error());
mysql_query('SET NAMES utf8');
$cdate = date("Y-m-d H:i:s");

//http://mkiit.ru/dep/addPoint.php?latitude=42&longitude=42&workerId=0
$query = "INSERT INTO tracks SET Latitude='".$_GET['latitude']."', Longitude='".$_GET['longitude']."', worker_id='".$_GET['workerId']."'"; 

mysql_query($query) or die(mysql_error());

echo(mysql_query($query));

mysql_close(); 
?>