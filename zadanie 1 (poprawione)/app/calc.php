<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$okres = $_REQUEST ['okres'];
$procent = $_REQUEST ['procent'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

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

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = floatval($kwota);
	$okres = intval($okres);
	$procent = floatval($procent);
	
	//wykonanie operacji
	$result = ($kwota * ($procent / 100))*$okres+$kwota;
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';