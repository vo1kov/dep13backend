<?
require_once "db_var.php";
 $id = abs((int)$_GET['zap']);
/* Создаем соединение */
mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");

/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
mysql_query('SET NAMES cp1251');
 
/* Составляем запрос для обновления информации в таблице*/
$query = "UPDATE ".$table." SET Flag = 1 WHERE id = ".$id;

/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysql_query($query) or die(mysql_error());
 
/* Закрываем соединение */
mysql_close();
 
/* В случае успешного сохранения выводим сообщение и ссылку возврата */
echo ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"green\">Статус данной записи изменен на \"Выполнен\"!</font>
<a href=\"db_view.php\">Вернуться назад</a></div>");
 
?>