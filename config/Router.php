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
                if($route === 'viewArticle')
                {
                    $this->frontController->getPublishedArticle($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'article')
                {
                    $this->backController->getArticle($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'addArticle')
                {
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif($route === 'publishArticle')
                {
                    $this->backController->publishArticle($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'unpublishArticle')
                {
                    $this->backController->unpublishArticle($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'editArticle')
                {
                    $this->backController->editArticle($this->request->getPost(),$this->request->getGet()->get('articleId'));
                }
                elseif($route === 'deleteArticle')
                {
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'addComment')
                {
                    $this->backController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif($route === 'flagComment')
                {
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'), $this->request->getGet()->get('articleId'));
                }
                elseif($route === 'unflagComment')
                {
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'deleteComment')
                {
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'),$this->request->getGet()->get('pseudo'));
                }
                elseif($route === 'register')
                {
                    $this->frontController->register($this->request->getPost());
                }
                elseif($route === 'login')
                {
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'profile')
                {
                    $this->backController->profile();
                }
                elseif($route === 'updateEmail')
                {
                    $this->backController->updateEmail($this->request->getPost());
                }
                elseif ($route === 'updatePassword')
                {
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout')
                {
                    $this->backController->logout();
                }
                elseif($route === 'deleteAccount')
                {
                    $this->backController->deleteAccount();
                }
                elseif($route === 'deleteUser')
                {
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration')
                {
                    $this->backController->administration();
                }
                elseif ($route === 'errorPermission')
                {
                    $this->errorController->errorPermission();
                }
                 // can't find route
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
            var_dump($ex);
            $this->errorController->errorServer();
        }
    }
}