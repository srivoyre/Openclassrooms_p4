<?php

namespace App\src\controller;

use App\src\Parameter;

/**
 * Class FrontController
 * @package App\src\controller
 */
class FrontController extends Controller
{
    /**
     * @return View
     */
    public function home()
    {
        $articles = $this->articleDAO->getArticles(true);
        return $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    /**
     * @param string $articleId
     * @return View
     */
    public function getPublishedArticle(string $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId, true);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        if (empty($article->getId())) {
            return $this->view->render('error_404');
        }
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    /**
     * @param string $commentId
     * @param string $articleId
     */
    public function flagComment(string $commentId, string $articleId)
    {
        $this->commentDAO->flagComment($commentId);
        $this->session->set(
            'info_message',
            'Le commentaire a bien été signalé'
        );
        header('Location: index.php?route=viewArticle&articleId='.$articleId);
    }

    /**
     * @param Parameter $post
     * @return View
     */
    public function register(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if ($this->userDAO->checkUser($post, 'pseudo', 'pseudo', 'register')) {
                $errors['pseudo'] = $this->userDAO->checkUser($post, 'pseudo', 'pseudo','register');
            }

            if ($this->userDAO->checkUser($post, 'email', 'email', 'register')) {
                $errors['email'] = $this->userDAO->checkUser($post, 'email', 'email', 'register');
            }

            if (!$errors) {
                $this->userDAO->register($post);
                $this->login($post);
                $this->session->set(
                    'success_message',
                    'Votre inscription a bien été effectuée'
                );
                header('Location: index.php');
            }

            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    /**
     * @param Parameter $post
     * @return View
     */
    public function login(Parameter $post)
    {
        if ($post->get('submit')) {

            // We give the user the possibility to login with either his pseudo or his email
            $validUsername = '';
            $checkPseudo = $this->userDAO->checkUser($post, 'pseudo', 'pseudo', 'login');
            $checkEmail = $this->userDAO->checkUser($post, 'pseudo', 'email', 'login');

            if ($checkPseudo) {
                $validUsername = 'pseudo';
            } elseif ($checkEmail) {
                $validUsername = 'email';
            }

            $checkPassword = $validUsername ? $this->userDAO->checkPassword($post, $validUsername): '';

            if ($checkPassword) {
                $this->session->set('loggedIn', true);
                $this->session->set('user', $checkPassword['user']);
                $this->session->set(
                    'info_message',
                    'Content de vous revoir '.$this->session->get('user')->getPseudo(). ' !'
                );
                header('Location: index.php');
            } else {
                $this->session->set(
                    'error_message',
                    'Le pseudo et/ou le mot de passe sont incorrects'
                );
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
        }

        if ($this->session->get('loggedIn')) {
            header('Location: index.php');
        } else {
            return $this->view->render('login');
        }
        return $this->view->render('login');
    }
}