<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }
    public function loginAction() {
        $this->view->render('Вход');
    }

    public function addAction() {
        $this->view->render('Добавление статьи');
    }

    public function editAction() {
        $this->view->render('Редактирование статьи');
    }

    public function postsAction() {
        $this->view->render('Посты');
    }

    public function logoutAction() {
    }
    
    public function deleteAction() {
    }
}