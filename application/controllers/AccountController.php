<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction() {
        if (!empty($_POST)) {
            $this->view->location("/account/register");
        }
        $this->view->render('Страница входа');
    }

    public function registerAction() {
        $this->view->render('Страница регистрации');
    }
}