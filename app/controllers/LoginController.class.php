<?php

namespace app\controllers;

use app\entities\User;
use app\forms\LoginForm;

class LoginController {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function loginAction() {
        if ($this->validateForm()) {
            header('Location: ' . getConf()->appUrl . '/');
        } else {
            $this->generateView();
        }
    }

    public function logoutAction() {
        session_destroy();
        getMessages()->addInfo('Poprawnie wylogowano z systemu');
        $this->generateView();
    }

    private function validateForm() {
        if (!isset($this->form->login) || !isset($this->form->password)) {
            return false;
        }
    
        if ($this->form->login == '') {
            getMessages()->addError('Nie podano loginu');
        }
    
        if ($this->form->password == '') {
            getMessages()->addError('Nie podano hasła');
        }
    
        if (getMessages()->isError()) {
            return false;
        }
    
        if ($this->form->login == 'admin' && $this->form->password == 'admin') {
            $user = new User($this->form->login, 'admin');
            $_SESSION['user'] = serialize($user);
            addRole($user->role);
            return true;
        }
    
        if ($this->form->login == 'user' && $this->form->password == 'user') {
            $user = new User($this->form->login, 'user');
            $_SESSION['user'] = serialize($user);
            addRole($user->role);
            return true;
        }
        
        getMessages()->addError('Niepoprawne dane logowania');
        return false; 
    }

    private function generateView() {
        getSmarty()->assign('form', $this->form);
        getSmarty()->display('loginView.tpl');
    }

}