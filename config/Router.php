<?php

namespace App\config;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
    }
    public function run()
    {
        try
        {
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'post')
                {
                    $this->frontController->post($_GET['postId']);
                }
            else
                {
                    $this->errorController->errorNotFound();
                }
            }
            else
            {
                $this->frontController->home();
            }
        }
        catch (Exception $ex)
        {
           $this->errorController->errorServer();
        }
    }
}