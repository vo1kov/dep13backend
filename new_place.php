<?
 require_once "db_var.php";
/* Создаем соединение */
$link = mysql_connect($hostname, $username, $password) or die (mysql_error());

/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
mysql_set_charset('utf8',$link);
/* Составляем запрос для извлечения данных из полей */
$query = "SELECT * FROM tracks WHERE `worker_id` = 0 ORDER BY `id` DESC LIMIT 1";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
$stack = array(); 
$count=0;

while ($row = mysql_fetch_array($res)) {
  $json_data = array ('id'=>$row['id'],'Latitude'=>$row['Latitude'],'Longitude'=>$row['Longitude']);
  array_push($stack, $json_data);  
  $count++;
}

echo json_encode(array('pointsCount'=>$count,'points'=>$stack));
?>