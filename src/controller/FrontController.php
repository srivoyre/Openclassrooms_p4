<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles(true);
        return $this->view->render('home', [
            'articles' => $articles
        ]);
        //require '../templates/home.php';
    }

    public function getPublishedArticle($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId, true);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        if(empty($article->getId()))
        {
            return $this->view->render('error_404');
        }
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
        //require '../templates/single.php';
    }

    public function flagComment($commentId, $articleId)
    {
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment_message', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php?route=viewArticle&articleId='.$articleId);
    }

    public function register(Parameter $post)
    {
        if($post->get('submit'))
        {
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkUserPseudo($post))
            {
                $errors['pseudo'] = $this->userDAO->checkUserPseudo($post);
            }
            if($this->userDAO->checkUserEmail($post))
            {
                $errors['email'] = $this->userDAO->checkUserEmail($post);
            }
            if(!$errors)
            {
                $this->userDAO->register($post);
                $this->login($post);
                $this->session->set('register_message', 'Votre inscription a bien été effectuée');
                header('Location: ../public/index.php');
            }

            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit'))
        {
            $result = $this->userDAO->login($post);
            if($result && $result['isPasswordValid'])
            {
                $this->session->set('login_message', 'Content de vous revoir');
                $this->session->set('user', $result['user']);
                $this->session->set('loggedIn', true);
                header('Location: ../public/index.php');
            }
            else
            {
                $this->session->set('error_login_message', 'Le pseudo et/ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}