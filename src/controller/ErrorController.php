<?php

namespace App\src\controller;

class ErrorController extends Controller
{
    public function errorNotFound()
    {
        return $this->view->render('error_404');
        //require '../templates/error_404.php';
    }

    public function errorServer()
    {
        return $this->view->render('error_500');
        //require '../templates/error_500.php';
    }
}