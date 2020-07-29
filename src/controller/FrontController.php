<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home', [
            'articles' => $articles
        ]);
        //require '../templates/home.php';
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
        //require '../templates/single.php';
    }

    public function addComment(Parameter $post, $articleId)
    {
        if($post->get('submit'))
        {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors)
            {
                $this->commentDAO->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                // Stay on this page
                //header('Location: ../public/index.php?route=article&articleId='.$articleId);
                // redirects to home page
                header('Location: ../public/index.php');
            }
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }
}