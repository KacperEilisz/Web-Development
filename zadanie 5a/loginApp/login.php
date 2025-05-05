<?php
require_once dirname(__FILE__).'/../init.php';  


session_start();


function getParamsLogin(&$form) {
    $form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $form['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}

function validateLogin(&$form, &$messages) {
    // Sprawdzenie, czy parametry zostały przekazane
    if (!(isset($form['login']) && isset($form['pass']))) {
        return false;
    }

 
    if ($form['login'] == "") {
        $messages[] = 'Nie podano loginu';
    }
    if ($form['pass'] == "") {
        $messages[] = 'Nie podano hasła';
    }


    if (count($messages) > 0) return false;


    if ($form['login'] == "admin" && $form['pass'] == "admin") {
        $_SESSION['role'] = 'admin';  // Przypisanie roli admina
        return true;
    }
    if ($form['login'] == "user" && $form['pass'] == "user") {
        $_SESSION['role'] = 'user';  // Przypisanie roli użytkownika
        return true;
    }


    $messages[] = 'Niepoprawny login lub hasło';
    return false;
}


$form = array();
$messages = array();


getParamsLogin($form);


if (validateLogin($form, $messages)) {
    header("Location: ".$conf->app_url. "/index.php");
    exit;
} else {

    $smarty = getSmarty();  


    $smarty->assign('app_url', $conf->app_url);
    $smarty->assign('root_path', $conf->root_path);
    $smarty->assign('page_title', 'Logowanie');
    $smarty->assign('page_description', 'Zaloguj się');
    $smarty->assign('page_header', 'Panel logowania');
    $smarty->assign('form', $form);
    $smarty->assign('messages', $messages);


    $smarty->display($conf->root_path.'/loginApp/login_view.tpl');
}
?>