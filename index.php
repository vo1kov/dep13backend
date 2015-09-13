<!doctype html>
<!--[if IE 7 ]><html class="ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie8"> <![endif]-->
<!--[if IE 9 ]><html class="ie9"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html> <!--<![endif]-->

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Выполнение работ по содержанию автомобильных дорог</title>
	
	<link type="text/css" rel="stylesheet" href="style_form.css" media="all" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="required_fields.js"></script>

	
	
</head>

<body>
<div id="main">
<h1>Форма для заполнения</h1>

<div class="form_box">

<form action="save_form.php" method="POST" id="myform" name="save_form" class="rf" enctype="multipart/form-data">

<table border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td>
   <input type = "text" name="lat" maxlength = "11" class="rfield" placeholder="Широта" />
  </td>
 </tr>
 <tr>
  <td>
   <input type = "text" name="long" maxlength = "11" class="rfield" placeholder="Долгота" />
  </td>
 </tr>
 <tr>
  <td>
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	Фотография<input type = "file" class="rfield" name="imgload" />
  </td>
 </tr>
 <tr>
  <td colspan="2" align="center">
   <input type = "submit" align=center class="btn_submit disabled" value = "Отправить данные" />
   <input type = "reset" align=center class="btn_reset" value = "Сбросить" />
  </td>
 </tr>
</table>

</form>

</div>

<div class="clear"></div> 

</div>

<div style="text-align: center; margin-top: 10px;">
<a href="db_view.php">Посмотреть базу данных</a></div>
<hr>
<div style="text-align: center; margin-top: 10px;">
<a href="db_create.php">Создать базу данных</a></div>
<hr>
<div style="text-align: center; margin-top: 10px;">
<a href="#" onclick="if(confirm('Вы уверены, что хотите удалить базу данных?')){document.location.href='db_drop.php'}">Удалить базу данных!</a></div>
</body>

</html>