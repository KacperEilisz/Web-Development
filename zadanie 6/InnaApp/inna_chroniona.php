<?php
require_once dirname(__FILE__).'/../init.php';

include getConf()->root_path. '/loginApp/check.php'; 

$smarty = getSmarty();

$smarty->assign('page_title', 'Inna chroniona strona');
$smarty->assign('page_description', 'Strona chroniona');
$smarty->assign('page_header', 'Inna chroniona');

$smarty->assign('content', getConf()->root_path. '/innaApp/inna_view.tpl');

$smarty->assign('show_intro', false);

$smarty->display(getConf()->root_path.'/templates/main_layout.tpl');