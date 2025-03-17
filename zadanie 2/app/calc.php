<?php
require_once dirname(__FILE__).'/../config.php';



include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$kwota,&$okres,&$procent){
$kwota = $_REQUEST ['kwota'];
$okres = $_REQUEST ['okres'];
$procent = $_REQUEST ['procent'];
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$okres,&$procent,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($okres) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "" || $kwota <= 0) {
	$messages [] = 'Nie podano kwoty lub jest mniejsza niz 0';
}
if ( $okres == "" || $okres <= 0) {
	$messages [] = 'Nie podano okresu lub jest mniejszy niz 0';
}
if ( $procent == "" || $procent <= 0) {
	$messages [] = 'Nie podano procentu lub jest mniejszy niz 0';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $okres )) {
		$messages [] = 'Okres nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $procent )) {
		$messages [] = 'Procent nie jest liczbą całkowitą';
	}	
	
	if (count ( $messages ) != 0) return false;
	else return true;

}
}

// 3. wykonaj zadanie jeśli wszystko w porządku
function process(&$kwota,&$okres,&$procent,&$messages,&$result){
  global $role;
	
	//konwersja parametrów na int
	$kwota = floatval($kwota);
	$okres = intval($okres);
	$procent = floatval($procent);
	//wykonanie operacji
	
	if ($role != 'admin' && procent <= 10){
		$messages [] = 'Osoba nieuprawniona nie moze miec raty nizszej niz 10%';
	};
	
	$result = ($kwota * ($procent / 100))*$okres+$kwota;
	};
	

//definicja zmiennych kontrolera
$kwota = null;
$okres = null;
$procent = null;
$result = null;
$messages = array();

getParams($kwota,$okres,$procent);
if ( validate($kwota,$okres,$procent,$messages) ) { // gdy brak błędów
	process($kwota,$okres,$procent,$messages,$result);
}


// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';