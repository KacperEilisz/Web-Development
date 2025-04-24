<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

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

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

//pobiera parametry i podejmuje akcje
getParamsLogin($form);

//jesli walidacja sie udala to przekierowanie uzytkownika
if (validateLogin($form, $messages)) {
    //przekierowanie po udanym logowaniu
    header("Location: " . _APP_URL . "/index.php");
    exit;
} else {
    $smarty = new Smarty();
    $smarty->assign('app_url', _APP_URL);
    $smarty->assign('root_path', _ROOT_PATH);
    $smarty->assign('page_title', 'Logowanie');
    $smarty->assign('page_description', 'Zaloguj się');
    $smarty->assign('page_header', 'Panel logowania');
    $smarty->assign('form', $form);
    $smarty->assign('messages', $messages);

    $smarty->display(_ROOT_PATH.'/views/login_view.tpl');
}
?>