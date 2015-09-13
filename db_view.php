<?
 require_once "db_var.php";
/* Создаем соединение */
$link = mysql_connect($hostname, $username, $password) or die (mysql_error());

/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
mysql_set_charset('utf8',$link);
/* Составляем запрос для извлечения данных из полей */
$query = "SELECT id, Latitude, Longitude, URL, Flag, Data, Defect FROM $table";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
 
/* Выводим данные из таблицы */
//echo("");
 
/* Цикл вывода данных из базы конкретных полей */
while ($row = mysql_fetch_array($res)) {
    echo "<tr>\n";
	echo "<td><a href =".$row['URL'].">   <img src = \"".str_replace("upload", "tumbnails", $row['URL'])."\"/>  </a></td>\n";
	echo "<td valign=\"middle\">".$row['id']."</td>\n";
    echo "<td valign=\"middle\">".$row['Latitude']."</td>\n";
    echo "<td>".$row['Longitude']."</td>\n";
	//echo "<td><a href =".$row['URL'].">".$row['URL']."</a></td>\n";
	echo "<td>".$row['Data']."</td>\n";
    echo "<td>".$row['Flag']."</td>\n";
    echo "<td>".$row['Defect']."</td>\n</tr>\n";
}
 
echo ("</table>\n");
 
/* Закрываем соединение */
mysql_close();
 
?>