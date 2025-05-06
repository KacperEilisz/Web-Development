<?php
require_once dirname(__FILE__).'/../init.php';  // Zmieniamy na odpowiednią ścieżkę do init.php
session_start();
session_destroy();

//przekierowanie na stronę logowania
header("Location: ".$conf->app_url."/loginApp/login.php");
exit;


session_start();
session_destroy();

//przekierowanie na strone logowania
header("Location: ".$conf->app_url."/loginApp/login.php");
exit;