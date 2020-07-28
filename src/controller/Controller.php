<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;
use App\src\constraint\Validation;
use App\config\Request;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
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
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }

}