<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $request;
    private $frontController;
    private $backController;
    private $errorController;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }
    public function run()
    {
        var_dump($this->request->getPost());
        $route = $this->request->getGet()->get('route');
        try
        {
            if(isset($route))
            {
                // routes to post display
                if($route === 'post')
                {
                    $this->frontController->post($_GET['postId']);
                }
                // routes to post creation
                elseif($route === 'addPost')
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