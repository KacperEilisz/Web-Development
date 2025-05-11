<?php

namespace CalcApp\controllers;

use CalcApp\forms\CalcForm;
use CalcApp\transfer\CalcResult;

class CalcCtrl {
   
    private $form;
    private $result;
    
    public function __construct(){
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }
    
    public function getParams(){
        $this->form->kwota = getFromRequest('kwota');
        $this->form->procent = getFromRequest('procent');
        $this->form->okres = getFromRequest('okres');
    }
    
    public function validate(){
        if (!(isset($this->form->kwota) && isset($this->form->procent) && isset($this->form->okres))) {
            return false;
        }
    
        if ($this->form->kwota == "") {
            getMessages()->addError('Nie podano kwoty');
        }
        if ($this->form->procent == "") {
            getMessages()->addError('Nie podano procentu');
        }
        if ($this->form->okres == "") {
            getMessages()->addError('Nie podano okresu');
        }
        
        if (!getMessages()->isError()) {
            if (!is_numeric($this->form->kwota)) {
                getMessages()->addError('Kwota nie jest liczba');
            }
            if (!is_numeric($this->form->procent)) {
                getMessages()->addError('Procent nie jest liczba');
            }
            if (!is_numeric($this->form->okres)) {
                getMessages()->addError('Okres nie jest liczba');
            }
        }
        
        return !getMessages()->isError();
    }
    
    public function action_calcCompute(){
        $this->getParams();
        
        if ($this->validate()) {
            $this->form->kwota = doubleval($this->form->kwota);
            $this->form->procent = doubleval($this->form->procent);
            $this->form->okres = intval($this->form->okres);
            getMessages()->addInfo('Parametry poprawne');

            if (inRole('admin') && $this->form->procent <= 5) {
                getMessages()->addError('Tylko administrator może sprawdzać oprocentowanie poniżej 5%!');
            } else {
                $this->result->result = ($this->form->kwota * ($this->form->procent / 100)) * $this->form->okres + $this->form->kwota;
                getMessages()->addInfo('Wykonano obliczenia');
            }
        }

        $this->generateView();
    }
    
    public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
        
    public function generateView(){
        getSmarty()->assign('page_title','Kalkulator');
        getSmarty()->assign('page_description','Oblicz swoj kredyt juz teraz!');
        getSmarty()->assign('page_header','Kalkulator kredytowy');
					
        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('result',$this->result);
		
        getSmarty()->display('calc_view.tpl');
    }
}