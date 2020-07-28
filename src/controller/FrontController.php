<?php

namespace App\src\controller;
use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

class FrontController extends Controller
{
    public function home()
    {
        $posts = $this->postDAO->getPosts();
        return $this->view->render('home', [
            'posts' => $posts
        ]);
        //require '../templates/home.php';
    }

    public function post($postId)
    {
        $post = $this->postDAO->getPost($postId);
        $comments = $this->commentDAO->getCommentsFromPost($postId);
        return $this->view->render('single', [
            'post' => $post,
            'comments' => $comments
        ]);
        //require '../templates/single.php';
    }
}