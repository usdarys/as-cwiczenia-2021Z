<?php 

namespace app\forms;

class CreditCalculatorForm {

    public $amount;
    public $numberOfYears;
    public $interest;

    public function __construct() {
        $this->amount = getFromRequest('amount');
        $this->numberOfYears = getFromRequest('numberOfYears');
        $this->interest = getFromRequest('interest');
    }
}