<?php
require_once dirname(__FILE__).'/../config.php';


//rozpoczecie sesji
session_start();
//pobranie roli uzytkownika
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

//jeśli brak parametru (niezalogowanie) to idź na stronę logowania
if ( empty($role) ){
	include _ROOT_PATH.'/controlers/login.php';
	//zatrzymaj przetwarzanie skryptow
	exit();
}
//jezeli ok to dalej