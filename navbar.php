<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        <a class="navbar-brand" href="#">ФГУ ДЭП 13</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?=echoActiveClassIfRequestMatches("defectsTable")?>> <a href="defectsTable.php">Таблица дефектов</a></li>
            <li <?=echoActiveClassIfRequestMatches("map")?>> <a href="map.php">Карта дефектов</a></li>
            <li><a href="#reports">Отчеты</a></li>
            <li><a href="#contact">О проекте</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php 

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo("class=\"active\"");
}

?>