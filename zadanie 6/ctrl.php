<?php
require_once 'init.php';


switch ($action) {
	default : // 'calcView'
                include 'check.php';	
                $ctrl = new CalcApp\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'login': // akcja PUBLICZNA - brak check.php
		$ctrl = new CalcApp\controllers\LoginCtrl();
		$ctrl->doLogin();
	break;
        case 'calcCompute' :
		
                include 'check.php';	
                $ctrl = new CalcApp\controllers\CalcCtrl();
		$ctrl->process ();
	break;
        case 'logout' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		$ctrl = new CalcApp\controllers\LoginCtrl();
		$ctrl->doLogout();
	break;
	case 'action1' :
		// zrób coś innego ...
		print('hello');
	break;
	case 'action2' :
		// zrób coś innego ...
		print('goodbye');
	break;
}
