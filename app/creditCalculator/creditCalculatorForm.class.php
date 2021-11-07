<?php 

class CreditCalculatorForm {

    public $amount;
    public $numberOfYears;
    public $interest;

    public function __construct() {
        $this->amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
        $this->numberOfYears = isset($_REQUEST['numberOfYears']) ? $_REQUEST['numberOfYears'] : null;
        $this->interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
    }
}