<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }
    public function run()
    {
        try
        {
            if(isset($_GET['route']))
            {
                // routes to post display
                if($_GET['route'] === 'post')
                {
                    $this->frontController->post($_GET['postId']);
                }
                // routes to post creation
                elseif($_GET['route'] == 'addPost')
                {
                    $this->backController->addPost($_POST);
                }
                 //no route specified / can't find route
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