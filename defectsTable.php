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

    <title>База дефектов</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

      </head>

  <body>

    <?php include 'navbar.php';?>

    <div class="container">

      <div class="starter-template">
        <h1>Вывод ранее сохраненных данных из таблицы MySQL</h1>
        <p class="lead">В таблице отображаются все дефекты
        <br> Для сортировки нажмите на заголовок столбца</p>
      </div>

    </div><!-- /.container -->
 
<div class="container"> 

<table  class="table table-striped">
<!--border="1" border-color="#ddd" -->
 <tr>
  <td><b>Фото</b></td>
  <td><b>№</b></td>
  <td><b>Широта</b></td>
  <td><b>Долгота</b></td>
  <td><b>Дата</b></td>
  <td><b>Статус</b></td>
  <td><b>Дефект</b></td>
 </tr>


 <?php include 'db_view.php';?>

</div>

 <?/* Строка для изменения */?>
 <div class="container"> 
<h3>Ввести номер записи для изменения статуса выполнения:</h3>
<form action="zap_vip.php" method="GET" id="myform" name="zap_form" class="rf" enctype="text/plain">
<table border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td>
   <input type = "text" name="zap" maxlength = "3" class="rfield" placeholder="Выбрать запись" />
   <input type = "submit" align="center" class="btn_submit disabled" value = "Выполнено" />
  </td>
 </tr>
</table>

</form>
 
<?/* Выводим ссылку возврата */?>
<div style="text-align: center; margin-top: 10px;"><a href="map.php">Посмотреть метки на карте</a></div>
    <div id = map style = width: 600px; height: 400px></div>
<div style="text-align: center; margin-top: 10px;"><a href="index.php">Вернуться назад</a></div>
    <div id = map style = width: 600px; height: 400px></div>

</div>  
<br>
<br>
<div class="well">
        <p>Разработанно в ИМСУТ - МТУСИ - МАДИ по заказу ФГУ ДЭП 13.</p>
        <p>2014-2015</p>
        <p>Все права защищенны</p>
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
</body>
  </html>