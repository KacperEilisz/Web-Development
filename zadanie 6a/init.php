<?php
require_once 'core/Config.class.php';
$conf = new core\Config();
require_once 'config.php'; //ustaw konfigurację

function &getConf(){ global $conf; return $conf; }

//załaduj definicję klasy Messages i stwórz obiekt
require_once 'core/Messages.class.php';
$msgs = new core\Messages();

function &getMessages(){ global $msgs; return $msgs; }

//przygotuj Smarty, twórz tylko raz - wtedy kiedy potrzeba
$smarty = null;	
function &getSmarty(){
	global $smarty;
	if (!isset($smarty)){
		//stwórz Smarty i przypisz konfigurację i messages
		include_once getConf()->root_path.'/lib/smarty/libs/Smarty.class.php';
		$smarty = new Smarty();	
		//przypisz konfigurację i messages
		$smarty->assign('conf',getConf());
		$smarty->assign('messages',getMessages());
		//zdefiniuj lokalizację widoków (aby nie podawać ścieżek przy ich załączaniu)
		$smarty->setTemplateDir(array(
			'one' => getConf()->root_path.'/templates/',
			'two' => getConf()->root_path.'/calcApp/views/'
		));
	}
	return $smarty;
}

require_once 'core/ClassLoader.class.php'; //załaduj i stwórz loader klas
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

require_once getConf()->root_path.'/core/functions.php';

session_start(); //uruchom lub kontynuuj sesję
$conf->roles = isset($_SESSION['_roles']) ? unserialize($_SESSION['_roles']) : array(); //wczytaj role

$action = getFromRequest('action');
