<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function addPost(Parameter $post)
    {
        if($post->get('submit'))
        {
            $this->postDAO->addPost($post);
            $this->session->set('add_post', 'Le nouvel article a bien été ajouté');
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_post', [
            'post' => $post
        ]);
    }
}