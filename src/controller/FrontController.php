<?php

namespace App\src\controller;
use App\config\Parameter;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

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
            $this->commentDAO->addComment($post, $articleId);
            $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
            header('Location: ../public/index.php?route=article&articleId='.$articleId);
        }
    }
}