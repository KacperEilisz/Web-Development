<?php
require_once dirname(__FILE__).'/../config.php';
require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';
//sprawdzanie roli uzytkownika
include $conf->root_path. '/loginApp/check.php'; 


//smarty
$smarty = new Smarty();

$smarty->assign('app_url', $conf->app_url);
$smarty->assign('root_path', $conf->root_path);
$smarty->assign('page_title', 'Inna chroniona strona');
$smarty->assign('page_description', 'Strona chroniona');
$smarty->assign('page_header', 'Inna chroniona');

$smarty->assign('content', $conf->root_path. '/innaApp/inna_view.tpl');
//wyswietlanie intro na poczatku
$smarty->assign('show_intro', false);
$smarty->display($conf->root_path.'/templates/main_layout.tpl');