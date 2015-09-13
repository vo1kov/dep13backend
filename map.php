<?

//if($_COOKIE["login"]=="unautorised")
//exit;


require_once "db_var.php";
$i = 1;
$j = 55.76;
$k = 37.64;
/* Создаем соединение */
$link=mysql_connect($hostname, $username, $password) or die (mysql_error());
mysql_set_charset('utf8',$link); 
/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());

 /* Составляем запрос для получения из БД количества записей*/
$query = "SELECT MAX(id) FROM ".$table;

/* Выполняем запрос и выясняем имя загружаемой картинки. Если произойдет ошибка - вывести ее. */
$last=mysql_query($query) or die(mysql_error());
$lastzap = mysql_fetch_array($last);
$zap = $lastzap[0];

/* Составляем запрос для обработки*/
$query = "SELECT id, Latitude, Longitude, Flag, URL, Data, Defect FROM ".$table;

/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Карта с данными</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map ("map", {
                center: [55.76, 37.64],
                zoom: 11
               
            });

<?

while ($row = mysql_fetch_array($res)) {
$marker="yellow";
if($row['Defect']=="Покрытие") $marker="red";
if($row['Defect']=="Обочина") $marker="yellow";
if($row['Defect']=="Разметка") $marker="lime";
if($row['Defect']=="Водосброс") $marker="green";
if($row['Defect']=="Брус") $marker="cyan";
if($row['Defect']=="Знак") $marker="blue";
if($row['Defect']=="Полоса съезда") $marker="purple";
if($row['Defect']=="Прочее") $marker="magenta";



	if($row['Flag']==0)
echo("myPlacemark".$i." = new ymaps.Placemark([".$row['Latitude'].", ".$row['Longitude']."], 
	{        
	 	hintContent: 'Запись №".$row['id']."',
     	balloonContent: '<p align = center>Дата : ".$row['Data']."</p><img align = center width = 400 hight = 200 src=".$row['URL'].">'
    },
	{
		iconLayout: 'default#image',
        iconImageHref: 'map/".$marker.".png',
        iconImageSize: [28, 40],
        iconImageOffset: [-20, -40]
	});        
	myMap.geoObjects.add(myPlacemark".$i."); ");
$i++;
}
mysql_close();
?>

        }
    </script>
</head>

<body style="text-align: center;">

  <?php include 'navbar.php';?>

    <div id="map" style="width: 100%; height: 600px;"></div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="move_placemark.js"></script>


</body>
</html>