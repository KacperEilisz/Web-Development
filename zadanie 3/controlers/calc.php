<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/controlers/check.php';
//ladowanie smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

//pobranie parametrow
function getParams(&$kwota,&$procent,&$okres){
    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
    $okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;    
}

// Walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$procent,&$okres,&$messages){
    //sprawdzenie czy podano parametry
    if (!(isset($kwota) && isset($procent) && isset($okres))) {
        //case w ktorym wywola sie bezposrednio a nie z formularza
        return false;
    }

    //sprawdzenie czy wartosci zostaly przekazane
    if ($kwota == "" || $kwota <= 0) {
        $messages[] = 'Nie podano właściwej kwoty kredytu';
    }
    if ($procent == "" || $procent <= 0) {
        $messages[] = 'Nie podano właściwego procentu';
    }
    if ($okres == "" || $okres <= 0) {
        $messages[] = 'Nie podano właściwego okresu kredytowania';
    }

    //nie waliduje jezeli brak parametrow
    if (count($messages) != 0) return false;
    
    //sprawdzenie czy wartosci to liczby
    if (!is_numeric($kwota)) {
        $messages[] = 'Nieprawidłowa kwota';
    }
    
    if (!is_numeric($procent)) {
        $messages[] = 'Nieprawidłowy procent';
    }
    
    if (!is_numeric($okres)) {
        $messages[] = 'Nieprawidłowy okres kredytowania';
    }

    if (count($messages) != 0) return false;
    else return true;
}

//wykonanie operacji i weryfikacja roli
function process(&$kwota,&$procent,&$okres,&$messages,&$result){
    global $role;
    
    //parametry na int
    $kwota = doubleval($kwota);
    $procent = doubleval($procent);
    $okres = intval($okres);
    
    //sprawdza role (5% dla usera)
    if($role != 'admin' && $procent <= 5) { 
        $messages[] = 'Tylko administrator może sprawdzać oprocentowanie poniżej 5%!';
    }
    //gdy wszystko sie zgadza to oblicza
    else {
        $result = ($kwota * ($procent / 100)) * $okres + $kwota;
    }
}

//definicja zmiennych kontrolera
$kwota = null;
$procent = null;
$okres = null;
$result = null;
$messages = array();

//jesli wszystko w porzadku to pobiera parametry i wykonuje zadanie
getParams($kwota, $procent, $okres);
if (validate($kwota, $procent, $okres, $messages)) { //brak bledow
    process($kwota, $procent, $okres, $messages, $result);
}

//$form do smarty
$form = array(
    'kwota' => $kwota,
    'procent' => $procent,
    'okres' => $okres
);

//ladowanie smarty
$smarty = new Smarty();
$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator');
$smarty->assign('page_description', 'Obliczanie raty kredytu');
$smarty->assign('page_header', 'Kalkulator');

//przypisanie zmiennych smarty
$smarty->assign('form', $form);
$smarty->assign('result', $result);
$smarty->assign('messages', $messages);

//wyswietlanie widoku
$smarty->display(_ROOT_PATH.'/views/calc_view.tpl');
?>