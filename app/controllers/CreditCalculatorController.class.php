<?php

namespace app\controllers;

use app\forms\CreditCalculatorForm;

class CreditCalculatorController {

    private $form;
    private $installment;

    public function __construct() {
        $this->form = new CreditCalculatorForm();
        $this->installment = null;
    }

    public function creditCalculatorAction() {
        if ($this->validateForm()) {
            $this->calculateCreditInstallment();
        }

        $this->generateView();
    }

    private function validateForm() {    
        if (!isset($this->form->amount) || !isset($this->form->numberOfYears) || !isset($this->form->interest)) {
            return false;
        }

        if (!is_numeric($this->form->amount)) {
            getMessages()->addError('Niepoprawny format kwoty');
        }
        
        if (!is_numeric($this->form->numberOfYears)) {
            getMessages()->addError('Niepoprawny format liczby lat');
        }
        
        if (!is_numeric($this->form->interest)) {
            getMessages()->addError('Niepoprawny format oprocentowania');
        }

        if (getMessages()->isError()) {
            return false;
        }
        
        $this->form->amount = floatval($this->form->amount);
        $this->form->numberOfYears = intval($this->form->numberOfYears);
        $this->form->interest = floatval($this->form->interest);
        
        if ($this->form->amount <= 0) {
            getMessages()->addError('Kwota musi być większa od zera');
        }
    
        if ($this->form->numberOfYears <= 0) {
            getMessages()->addError('Liczba lat musi byc min. 1');
        }
    
        if ($this->form->interest < 0) {
            getMessages()->addError('Oprocentowanie nie moze być mniejsze niż 0');
        }
    
        if (getMessages()->isError()) {
            return false;
        }
    
        return true;
    }

    private function calculateCreditInstallment() {
        if ($this->form->interest == 0) {
            $this->installment = $this->form->amount / ($this->form->numberOfYears * 12);
        } else {
            $this->installment = ($this->form->amount / ($this->form->numberOfYears * 12)) + ($this->form->interest * $this->form->amount / 100);
        }
    
        return $this->installment;
    }

    private function generateView() {
        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('installment', $this->installment);
        getSmarty()->display('creditCalculatorView.tpl');
    }

}