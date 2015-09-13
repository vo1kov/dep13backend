<?
require_once "db_var.php";

/* Создаем соединение */
mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");

/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
mysql_query('SET NAMES cp1251');
 
/* Определяем текущую дату */
$cdate = date("Y-m-d H:i:s");
 
 /* Составляем запрос для получения из БД номера последней добавленной записи*/
$query = "SELECT MAX(id) FROM ".$table;


/* Выполняем запрос и выясняем имя загружаемой картинки. Если произойдет ошибка - вывести ее. */
$numlast=mysql_query($query) or die(mysql_error());
$numlastzap = mysql_fetch_array($numlast);
$fname = $numlastzap[0]+1 . '.jpeg';

 
/* Производим загрузку картинки на сервер */
$ftype = $_FILES['imgload']["type"];
$fsize = $_FILES['imgload']["size"];
$ftname = $_FILES['imgload']["tmp_name"];
$url = "upload/".$fname;

if (($ftype == "image/jpeg") && ($fsize < 5000000)){
	if ($_FILES['imgload']["error"] > 0){
		echo "Код ошибки: ".$_FILES['imgload']["error"]."<br />";
    }
	else{
		/* echo "Имя файла: ".$fname. "<br />";
		echo "Тип файла: ".$ftype. "<br />";
		echo "Размер: ".($fsize / 1024)." Кб<br />";
		echo "Временное имя: ".$ftname."<br />"; */
		if (file_exists($url)){
			echo "Файл с именем ".$fname." уже существует.";
		}
		else{
			move_uploaded_file($ftname, $url);
		}
    }

  
/* Составляем запрос для вставки информации в таблицу*/
$query = "INSERT INTO ".$table." SET Latitude='".$_POST['lat']."', Longitude='".$_POST['long']."', URL ='$url', Flag = 0, Data='".$cdate."'"; 

/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysql_query($query) or die(mysql_error());
}
else{
	echo "Неверный формат или привышен допустимый размер загружаемой картинки. Попробуйте еще раз<br />";
}
/* Закрываем соединение */
mysql_close();
 
/* В случае успешного сохранения выводим сообщение и ссылку возврата */
echo ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"green\">Данные успешно сохранены!</font>
 
<a href=\"index.php\">Вернуться назад</a></div>");
 
?>