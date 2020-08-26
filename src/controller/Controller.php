<?php

namespace App\src\controller;

use App\src\model\DAO\ArticleDAO;
use App\src\model\DAO\CommentDAO;
use App\src\model\DAO\UserDAO;
use App\src\controller\View;
use App\src\constraint\Validation;
use App\src\Request;

/**
 * Class Controller
 * @package App\src\controller
 */
abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $view;
    protected $validation;
    private $request;
    protected $get;
    protected $post;
    protected $session;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }

}