<?
 
require_once "db_var.php";
 
/* Создаем соединение */
$link = mysql_connect($hostname, $username, $password) or die (mysql_error());
mysql_set_charset('utf8',$link);
 
/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
 
/* Составляем запрос для извлечения данных из полей */
$query = "SELECT id, Latitude, Longitude, URL, Flag, Data, Defect FROM $table";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
 
/* Выводим данные из таблицы */
//$json_data = array ('id'=>1,'name'=>"ivan",'country'=>'Russia',"office"=>array("yandex"," management"));
//echo json_encode($json_data);

$seaLevel=0;
//echo "{";

$stack = array(); 
$count=0;

/* Цикл вывода данных из базы конкретных полей */
while ($row = mysql_fetch_array($res)) {
  $json_data = array ('id'=>$row['id'],'Latitude'=>$row['Latitude'],'Longitude'=>$row['Longitude'],'Altitude'=>$seaLevel,'URL'=>$row['URL'],'Type'=>$row['Defect'],'Date'=>$row['Data'],'Done'=>$row['Flag']);
  array_push($stack, $json_data);  
  $count++;
}

echo json_encode(array('defectCount'=>$count,'defects'=>$stack));    
 
// echo "}";
/* Закрываем соединение */
mysql_close();
?>