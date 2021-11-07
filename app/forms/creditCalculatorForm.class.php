<?php 

namespace app\forms;

class CreditCalculatorForm {

    public $amount;
    public $numberOfYears;
    public $interest;

    public function __construct() {
        $this->amount = getRequestParameter('amount');
        $this->numberOfYears = getRequestParameter('numberOfYears');
        $this->interest = getRequestParameter('interest');
    }
}