<?php
require_once dirname(__FILE__).'/../config.php';


include _ROOT_PATH.'/controlers/check.php';


function getParams(&$kwota,&$procent,&$okres){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
	$okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;	
}


function validate(&$kwota,&$procent,&$okres,&$messages){
	
	if ( ! (isset($kwota) && isset($procent) && isset($okres))) {
		
		return false;
	}

	
	if ( $kwota == "" || $kwota <= 0) {
		$messages [] = 'Nie podano wlasciwej kwoty kredytu';
	}
	if ( $procent == "" || $procent <= 0) {
		$messages [] = 'Nie podano wlasciwego procentu';
	}
	if ( $okres == "" || $okres <= 0) {
		$messages [] = 'Nie podano wlasciwego okresu kredytowania';
	}

	
	if (count ( $messages ) != 0) return false;
	
	
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
	
	
	$kwota = doubleval($kwota);
	$procent = doubleval($procent);
	$okres = intval($okres);
	
	if($role != 'admin' && $procent <=5) { 
	$messages [] = 'Tylko administrator moze sprawdzac oprocentowanie ponizej 5 procent!';
	}
	else {$result = ($kwota * ($procent / 100))*$okres+$kwota;
	}
}


$kwota = null;
$okres = null;
$procent = null;
$result = null;
$messages = array();


getParams($kwota,$okres,$procent);
if ( validate($kwota,$okres,$procent,$messages) ) { 
	process($kwota,$okres,$procent,$messages,$result);
}
include __DIR__ . '/../views/calc_view.php';
