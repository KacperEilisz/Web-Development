<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';
//sprawdzanie roli uzytkownika
include _ROOT_PATH . '/controlers/check.php'; 


//smarty
$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Inna chroniona strona');
$smarty->assign('page_description', 'Strona chroniona');
$smarty->assign('page_header', 'Inna chroniona');

$smarty->assign('content', _ROOT_PATH . '/views/inna_view.tpl');
//wyswietlanie intro na poczatku
$smarty->assign('show_intro', false);
$smarty->display(_ROOT_PATH.'/templates/main_layout.tpl');