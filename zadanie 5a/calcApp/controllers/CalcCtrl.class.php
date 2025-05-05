<?php
require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl {
   
    private $form;
    private $result;
    
    public function __construct(){
        $this->messages = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }
    
    public function getParams(){
        $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $this->form->procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
        $this->form->okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;
    }
    
    public function validate(){
        if (!(isset($this->form->kwota) && isset($this->form->procent) && isset($this->form->okres))) {
            return false;
        }
    
        if ($this->form->kwota == "") {
            $this->messages->addError('Nie podano kwoty');
        }
        if ($this->form->procent == "") {
            $this->messages->addError('Nie podano procentu');
        }
        if ($this->form->okres == "") {
            $this->messages->addError('Nie podano okresu');
        }
        
        if (!$this->messages->isError()) {
            if (!is_numeric($this->form->kwota)) {
                $this->messages->addError('Kwota nie jest liczbą');
            }
            if (!is_numeric($this->form->procent)) {
                $this->messages->addError('Procent nie jest liczbą');
            }
            if (!is_numeric($this->form->okres)) {
                $this->messages->addError('Okres nie jest liczbą');
            }
        }
        
        return !$this->messages->isError();
    }
    
    public function process(){
        $this->getParams();
        
        if ($this->validate()) {
            $this->form->kwota = doubleval($this->form->kwota);
            $this->form->procent = doubleval($this->form->procent);
            $this->form->okres = intval($this->form->okres);
            $this->messages->addInfo('Parametry poprawne');

            $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user';

            if ($role != 'admin' && $this->form->procent <= 5) {
                $this->messages->addError('Tylko administrator może sprawdzać oprocentowanie poniżej 5%!');
            } else {
                $this->result->result = ($this->form->kwota * ($this->form->procent / 100)) * $this->form->okres + $this->form->kwota;
                $this->messages->addInfo('Wykonano obliczenia');
            }
        }

        $this->generateView();
    }
        
   public function generateView(){
   
    
                getSmarty()->assign('page_title','Kalkulator');
		getSmarty()->assign('page_description','Oblicz swoj kredyt juz teraz!');
		getSmarty()->assign('page_header','Kalkulator kredytowy');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('result',$this->result);
                getSmarty()->assign('messages', $this->messages);
		
		getSmarty()->display('calc_view.tpl');
}
}