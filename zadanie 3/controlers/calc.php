<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/controlers/check.php';

//pobranie parametrów
function getParams(&$kwota,&$procent,&$okres){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
	$okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$procent,&$okres,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($procent) && isset($okres))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "" || $kwota <= 0) {
		$messages [] = 'Nie podano wlasciwej kwoty kredytu';
	}
	if ( $procent == "" || $procent <= 0) {
		$messages [] = 'Nie podano wlasciwego procentu';
	}
	if ( $okres == "" || $okres <= 0) {
		$messages [] = 'Nie podano wlasciwego okresu kredytowania';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Niewlasciwa kwota';
	}
	
	if (! is_numeric( $procent )) {
		$messages [] = 'Niewlasciwy procent';
	}
	
	if (! is_numeric( $okres )) {
		$messages [] = 'Niewlasciwy okres kredytowania';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwota,&$procent,&$okres,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	$kwota = doubleval($kwota);
	$procent = doubleval($procent);
	$okres = intval($okres);
	
	if($role != 'admin' && $procent <=5) { 
	$messages [] = 'Tylko administrator moze sprawdzac oprocentowanie ponizej 5 procent!';
	}
	else {$result = ($kwota * ($procent / 100))*$okres+$kwota;
	}
	
	
	//wykonanie operacji
	
}

//definicja zmiennych kontrolera
$kwota = null;
$okres = null;
$procent = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$okres,$procent);
if ( validate($kwota,$okres,$procent,$messages) ) { // gdy brak błędów
	process($kwota,$okres,$procent,$messages,$result);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($kwota,$okres,$procent,$messages)
//   będą dostępne w dołączonym skrypcie
include __DIR__ . '/../views/calc_view.php';