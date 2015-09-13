<?
if(!isset($_SESSION['login']))
{
    echo 'Приветствую, гость! Вы можете авторизоваться <a href="login.php">здесь</a>';
}
else
    echo 'Приветствую, <b>', htmlspecialchars($_SESSION['login']), '</b>';
?>