<?php 
//ini_set('session.gc_maxlifetime', 120960);

//session_start();
if(isset($_GET['exit']))
{
    session_destroy();
    setcookie("login", "unautorised"); 
    //header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


  function showForm() {
 echo("   <!DOCTYPE html>
<html>
<head>
  <title>Authorization</title>
</head>
<body>");
  }



if($_COOKIE["login"]=="admin")
{
  showForm();
    echo 'Приветствую, <b>', htmlspecialchars($_COOKIE["login"]), '</b>';
echo(session_id());
    echo '<a href="?exit">выход</a>';
}
else
{    


if(isset($_POST['login'], $_POST['pass']))
{
  file_exists('./users.txt') || file_put_contents('./users.txt', '');
  $db = file('./users.txt', FILE_SKIP_EMPTY_LINES);
  $login = trim($_POST['login']);
  $pass  = trim($_POST['pass']);
  if( empty($login) || empty($pass) )
  {
    showForm();
    echo 'Вы заполнили не все поля.';
  }
  else
  {
    if(!empty($db))
    {
      $status = false;
      $search = $login . '|||' . md5($login);
      for($i = 0, $cnt = count($db); $i < $cnt; $i++)
      {
          if(trim($db[$i]) == $search)
          {
              $status = true;
              break;
          }
      }
      if($status)
      {
          //session_destroy();
          //echo("ПОПАЛИ В ЭТОТ ГРЕБАННЫЙ ИФ");
          setcookie("login", "admin"); 
          showForm();
          echo 'Вы вошли как <b>', $login, '</b><br><a href="?exit">Выйти</a><br><br>';
          //', $_SERVER['PHP_SELF'], '
          echo ("Нажмите <a href=\"map.php\">здесь</a>, если Ваш браузер не поддерживает редирект.");

          //'Через 5 секунд страница автоматически обновится.<br>
          //   Нажмите <a href="map.php">здесь</a>, если Ваш браузер не поддерживает редирект.
          //<meta http-equiv="Refresh" content="5;url=', $_SERVER['PHP_SELF'], '">';
      }
      else
          echo 'Пользователя с таким логином и/или паролем не найдено.';
    }
    else
      echo 'В настоящий момент сервер не доступен.';
  }
}
else
{
  showForm();
echo("
<form method=\"post\">
  Login: <input type=\"text\" name=\"login\"><br>
  Password: <input type=\"password\" name=\"pass\"><br>
  <input type=\"submit\" value=\"Enter\"><br>
</form>");
}

}
?>
</body>
</html>