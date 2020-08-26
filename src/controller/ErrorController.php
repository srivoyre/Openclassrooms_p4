<?php

namespace App\src\controller;

/**
 * Class ErrorController
 * @package App\src\controller
 */
class ErrorController extends Controller
{
    /**
     * @return View
     */
    public function errorNotFound()
    {
        return $this->view->render('error_404');
    }

    /**
     * @return View
     */
    public function errorServer()
    {
        return $this->view->render('error_500');
    }

    /**
     * @return View
     */
    public function errorPermission()
    {
        return $this->view->render('error_permission');
    }
}