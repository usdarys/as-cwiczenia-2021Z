<?php

namespace app\controllers;

class CalcHistoryController {

    private $calcHistory;

    public function __construct() {
        $this->calcHistory = array();
    }
    
    public function calcHistoryAction() {
        try {
            $this->calcHistory = getDB()->select("credit_calc_history", [
                'id',
                'date',
                'amount',
                'number_of_years',
                'interest',
                'installment'
            ]);
            $this->generateView();

        } catch(\PDOException $e) {
            getMessages()->addError('Database error: ' . $e->getMessage());
        }

    }

    private function generateView() {
        getSmarty()->assign('calcHistory', $this->calcHistory);
        getSmarty()->display('calcHistoryView.tpl');
    }
}