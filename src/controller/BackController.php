<?php

namespace App\src\controller;
use App\src\DAO\PostDAO;
use App\src\model\View;

class BackController extends Controller
{
    public function addPost($post)
    {
        if(isset($post['submit']))
        {
            $postDAO = new PostDAO();
            $postDAO->addPost($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_post', [
            'post' => $post
        ]);
    }


}