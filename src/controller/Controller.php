<?php

namespace App\src\controller;
use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

abstract class Controller
{
    protected $postDAO;
    protected $commentDAO;
    protected $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

}