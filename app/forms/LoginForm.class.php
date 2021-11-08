<?php 

namespace app\forms;

class LoginForm {

    public $login;
    public $password;

    public function __construct() {
        $this->login = getFromRequest('login');
        $this->password = getFromRequest('password');
    }
}