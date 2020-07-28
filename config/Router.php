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
        $route = $this->request->getGet()->get('route');
        try
        {
            if(isset($route))
            {
                // routes to article display
                if($route === 'article')
                {
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                // routes to article creation
                elseif($route === 'addArticle')
                {
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif($route === 'editArticle')
                {
                    $this->backController->editArticle($this->request->getPost(),$this->request->getGet()->get('articleId'));
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