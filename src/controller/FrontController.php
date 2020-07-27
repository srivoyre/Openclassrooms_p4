<?php

namespace App\src\controller;
use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;

class FrontController
{
    public function home()
    {
        $post = new PostDAO();
        $posts = $post->getPosts();
        require '../templates/home.php';
    }

    public function post($postId)
    {
        $post = new PostDAO();
        $posts = $post->getPost($postId);
        $comment = new CommentDAO();
        $comments = $comment->getCommentsFromPost($postId);
        require '../templates/single.php';
    }
}