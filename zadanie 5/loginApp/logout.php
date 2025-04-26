<?php
require_once dirname(__FILE__).'/../config.php';

session_start();
session_destroy();

//przekierowanie na strone logowania
header("Location: ".$conf->app_url."/loginApp/login.php");
exit;