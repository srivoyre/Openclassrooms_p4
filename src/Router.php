<?php

namespace App\src;

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
        try {
            if (isset($route)) {
                $this->route($route);
            } else {
                $this->frontController->home();
            }
        } catch (Exception $ex) {
            $this->errorController->errorServer();
        }
    }

    public function route($route)
    {
        /*switch ($route) {
            case 'viewArticle':
                $this->frontController->getPublishedArticle($this->request->getGet()->get('articleId'));
                break;
            case 'article':
                echo "i égal 1";
                break;
            case 2:
                echo "i égal 2";
                break;
        }*/
        switch ($route) {
            case 'viewArticle':
                $this->frontController->getPublishedArticle($this->request->getGet()->get('articleId'));
                break;
            case 'article':
                $this->backController->getArticle($this->request->getGet()->get('articleId'));
                break;
            case 'addArticle':
                $this->backController->addArticle($this->request->getPost());
                break;
            case 'publishArticle':
                $this->backController->publishArticle($this->request->getGet()->get('articleId'));
                break;
            case 'unpublishArticle':
                $this->backController->unpublishArticle($this->request->getGet()->get('articleId'));
                break;
            case 'editArticle':
                $this->backController->editArticle(
                    $this->request->getPost(),
                    $this->request->getGet()->get('articleId')
                );
                break;
            case 'deleteArticle':
                $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                break;
            case 'addComment':
                $this->backController->addComment(
                    $this->request->getPost(),
                    $this->request->getGet()->get('articleId')
                );
                break;
            case 'flagComment':
                $this->frontController->flagComment(
                    $this->request->getGet()->get('commentId'),
                    $this->request->getGet()->get('articleId')
                );
                break;
            case 'unflagComment':
                $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                break;
            case 'deleteComment':
                $this->backController->deleteComment(
                    $this->request->getGet()->get('commentId'),
                    $this->request->getGet()->get('articleId'),
                    $this->request->getGet()->get('pseudo')
                );
                break;
            case 'register':
                $this->frontController->register($this->request->getPost());
                break;
            case 'login':
                $this->frontController->login($this->request->getPost());
                break;
            case 'profile':
                $this->backController->profile();
                break;
            case 'updateEmail':
                $this->backController->updateEmail($this->request->getPost());
                break;
            case 'updatePassword':
                $this->backController->updatePassword($this->request->getPost());
                break;
            case 'logout':
                $this->backController->logout();
                break;
            case 'deleteAccount':
                $this->backController->deleteAccount();
                break;
            case 'deleteUser':
                $this->backController->deleteUser($this->request->getGet()->get('userId'));
                break;
            case 'administration':
                $this->backController->administration();
                break;
            case 'errorPermission':
                $this->errorController->errorPermission();
                break;
            default:
                $this->errorController->errorNotFound();
                break;
        }
        /*if ($route === 'viewArticle') {
            $this->frontController->getPublishedArticle($this->request->getGet()->get('articleId'));
        } elseif ($route === 'article') {
            $this->backController->getArticle($this->request->getGet()->get('articleId'));
        } elseif ($route === 'addArticle') {
            $this->backController->addArticle($this->request->getPost());
        } elseif ($route === 'publishArticle') {
            $this->backController->publishArticle($this->request->getGet()->get('articleId'));
        } elseif ($route === 'unpublishArticle') {
            $this->backController->unpublishArticle($this->request->getGet()->get('articleId'));
        } elseif ($route === 'editArticle') {
            $this->backController->editArticle(
                $this->request->getPost(),
                $this->request->getGet()->get('articleId')
            );
        } elseif ($route === 'deleteArticle') {
            $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
        } elseif ($route === 'addComment') {
            $this->backController->addComment(
                $this->request->getPost(),
                $this->request->getGet()->get('articleId')
            );
        } elseif ($route === 'flagComment') {
            $this->frontController->flagComment(
                $this->request->getGet()->get('commentId'),
                $this->request->getGet()->get('articleId')
            );
        } elseif ($route === 'unflagComment') {
            $this->backController->unflagComment($this->request->getGet()->get('commentId'));
        } elseif ($route === 'deleteComment') {
            $this->backController->deleteComment(
                $this->request->getGet()->get('commentId'),
                $this->request->getGet()->get('articleId'),
                $this->request->getGet()->get('pseudo')
            );
        } elseif ($route === 'register') {
            $this->frontController->register($this->request->getPost());
        } elseif ($route === 'login') {
            $this->frontController->login($this->request->getPost());
        } elseif ($route === 'profile') {
            $this->backController->profile();
        } elseif ($route === 'updateEmail') {
            $this->backController->updateEmail($this->request->getPost());
        } elseif ($route === 'updatePassword') {
            $this->backController->updatePassword($this->request->getPost());
        } elseif ($route === 'logout') {
            $this->backController->logout();
        } elseif ($route === 'deleteAccount') {
            $this->backController->deleteAccount();
        } elseif ($route === 'deleteUser') {
            $this->backController->deleteUser($this->request->getGet()->get('userId'));
        } elseif ($route === 'administration') {
            $this->backController->administration();
        } elseif ($route === 'errorPermission') {
            $this->errorController->errorPermission();
        } else {
            $this->errorController->errorNotFound();
        }*/
    }
}