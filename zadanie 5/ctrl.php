<?php
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
// - w tym wypadku jest już tylko jeden punkt wejścia do aplikacji - skrypt ctrl.php
require_once dirname (__FILE__).'/config.php';

//1. pobierz nazwę akcji

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

//2. wykonanie akcji
switch ($action) {
	default : // 'calcView'

		include_once $conf->root_path.'/calcApp/CalcCtrl.class.php';
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'kredytowy' :
		include_once $conf->root_path.'/calcApp/CalcCtrl.class.php';
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
		// zrób coś innego ...
	break;
}
