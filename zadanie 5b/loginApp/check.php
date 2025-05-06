<?php
require_once dirname(__FILE__).'/../config.php';

//rozpoczecie sesji
session_start();

//pobranie roli uzytkownika
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

//jesli niezalogowany to przekieruj na stronę logowania
if (empty($role)) {
    header("Location: ".$conf->app_url."/loginApp/login.php");
    exit();
}
//jesli jest rola to kontynuuj normalnie