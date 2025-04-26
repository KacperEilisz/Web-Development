<?php
require_once dirname(__FILE__).'/../config.php';
require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';

//start sesji
session_start();

//pobieranie parametrow
function getParamsLogin(&$form) {
    $form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $form['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}

//walidacja parametrow z przygotowaniem zmiennych dla widoku
function validateLogin(&$form, &$messages) {
    // Sprawdzenie, czy parametry zostały przekazane
    if (!(isset($form['login']) && isset($form['pass']))) {
        // Sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
        return false;
    }

    //sprawdzenie czy potrzebne wartosci zostaly przekazane
    if ($form['login'] == "") {
        $messages[] = 'Nie podano loginu';
    }
    if ($form['pass'] == "") {
        $messages[] = 'Nie podano hasła';
    }

    //nie ma sensu walidowac gdy brak parametrow
    if (count($messages) > 0) return false;

    //sprawdzenie czy dane logowania sa poprawne
    if ($form['login'] == "admin" && $form['pass'] == "admin") {
        $_SESSION['role'] = 'admin';
        return true;
    }
    if ($form['login'] == "user" && $form['pass'] == "user") {
        $_SESSION['role'] = 'user';
        return true;
    }

    $messages[] = 'Niepoprawny login lub hasło';
    return false;
}

//inicjacja zmiennych
$form = array();
$messages = array();

//pobieranie parametry i podejmuje akcje
getParamsLogin($form);

//jesli walidacja sie udala to przekierowanie uzytkownika
if (validateLogin($form, $messages)) {
    header("Location: ".$conf->app_url. "/index.php");
    exit;
} else {
    $smarty = new Smarty();
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