<?
require_once "db_var.php";

function getRandomFileName()
    {
        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $name . ".jpeg";
          echo $file;
        } while (file_exists($file));
        return $name;
    }

$postdata = file_get_contents("php://input");
//echo($postdata['size']);

/* Создаем соединение */
mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");

/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
mysql_query('SET NAMES utf8');
 
/* Определяем текущую дату */
$cdate = date("Y-m-d H:i:s");

/* Составляем запрос для получения из БД номера последней добавленной записи*/
$query = "SELECT MAX(id) FROM ".$table;


/* Выполняем запрос и выясняем имя загружаемой картинки. Если произойдет ошибка - вывести ее. */
$numlast=mysql_query($query) or die(mysql_error());
$numlastzap = mysql_fetch_array($numlast);
$fname = getRandomFileName(). '.jpeg';
 
$url = "upload/".$fname;
$fp = fopen( $url, 'wb' );
fwrite( $fp, $postdata);
fclose( $fp );


if (exif_imagetype($url) != IMAGETYPE_JPEG) {
    echo 'The picture is not a jpeg';
}
else
{
   $size = getimagesize($url);
   if ($size[0]<$size[1])
   {
      //портрет
      $size_src=$size[0];
      $src_y = ($size[1] - $size_src)/2;
      $src_x = 0;
   }
   else
   {
      //альбом
      $size_src=$size[1];
      $src_x = ($size[0] - $size_src)/2;
      $src_y = 0;
   }
 $tumb_size=52;
 $thumb = imagecreatetruecolor($tumb_size, $tumb_size);


echo("src_x".$src_x." src_y".$src_y." size_src".$size_src);

 imagecopyresampled ($thumb , imagecreatefromjpeg($url), 0 , 0 , $src_x, $src_y , $tumb_size , $tumb_size , $size_src  , $size_src);
 imagejpeg($thumb, "tumbnails/".$fname, 80);

 //ширина потом высота
 //$fp_tumb = fopen( "tumbnails/".$fname, 'wb' );
 //fwrite( $fp_tumb,imagejpeg($thumb));
 //fclose( $fp_tumb );

 //echo $url_tumb;

/* Составляем запрос для вставки информации в таблицу*/
//var surl = "http://109.188.74.153:8080/ObjectMonitoring/addDefect.htm?latitude="+self.latitude + "&longitude=" + self.longitude + "&defectType=" + self.defectType
//http://mkiit.ru/dep/addDefect.php?latitude=42&longitude=42&defectType=Покрытие
$query = "INSERT INTO ".$table." SET Latitude='".$_GET['latitude']."', Longitude='".$_GET['longitude']."', Defect='".$_GET['defectType']."', URL ='".$url."', Flag = 0, Data='".$cdate."'"; 


mysql_query($query) or die(mysql_error());
}
mysql_close();
?>