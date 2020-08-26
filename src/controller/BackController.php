<?php

namespace App\src\controller;

use App\src\Parameter;

/**
 * Class BackController
 * @package App\src\controller
 */
class BackController extends Controller
{
    /**
     * @return bool
     */
    private function checkLoggedIn()
    {
        if (!$this->session->get('user')) {
            $this->session->set(
                'warning_message',
                'Vous devez vous connecter pour accéder à cette page'
            );
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }

    /**
     * @return bool
     */
    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if (!($this->session->get('user')->getIsAdmin())) {
            $this->session->set(
                'warning_message',
                'Vous ne disposez pas des autorisations suffisantes pour accéder à cette page'
            );
            header('Location: ../public/index.php?route=errorPermission');
        } else {
            return true;
        }
    }

    /**
     * @return View
     */
    public function administration()
    {
        if ($this->checkAdmin()) {
            $articles = $this->articleDAO->getArticles(false);
            $comments = $this->commentDAO->getFlaggedComments();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'articles' => $articles,
                'comments' => $comments,
                'users' => $users
            ]);
        }
    }

    /**
     * @param string $articleId
     * @return View
     */
    public function getArticle(string $articleId)
    {
        if ($this->checkAdmin()) {
            $article = $this->articleDAO->getArticle($articleId, false);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments
            ]);
        } elseif ($this->checkLoggedIn()) {
            $article = $this->articleDAO->getArticle($articleId, true);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments
            ]);
        }
    }

    /**
     * @param Parameter $post
     * @return View
     */
    public function addArticle(Parameter $post)
    {
        if ($this->checkAdmin()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->addArticle($post, $this->session->get('user')->getId());
                    $this->session->set(
                        'success_message',
                        'Le nouvel article a bien été ajouté'
                    );
                    header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('add_article', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_article');
        }
    }

    /**
     * @param Parameter $post
     * @param string $articleId
     * @return View
     */
    public function editArticle(Parameter $post, string $articleId)
    {
        if ($this->checkAdmin()) {
            $article = $this->articleDAO->getArticle($articleId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->editArticle($post, $articleId, $this->session->get('user')->getId());
                    $this->session->set(
                        'success_message',
                        'L\'article a bien été modifié'
                    );
                }
                $post->set('id', $article->getId());
                return $this->view->render('edit_article', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            } elseif ($post->get('submitAndLeave')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->editArticle($post, $articleId, $this->session->get('user')->getId());
                    $this->session->set(
                        'success_message',
                        'L\'article a bien été modifié'
                    );
                    header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_article', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }

            $post->set('id', $article->getId());
            $post->set('title', $article->getTitle());
            $post->set('order_num', $article->getOrderNum());
            $post->set('published', $article->getIsPublished());
            $post->set('content', $article->getContent());
            $post->set('author', $article->getAuthor());

            return $this->view->render('edit_article',[
                'post' => $post
            ]);
        }
    }

    /**
     * @param string $articleId
     */
    public function publishArticle(string $articleId)
    {
        if ($this->checkAdmin()) {
            $this->articleDAO->editPublicationStatus(1, $articleId);
            $this->session->set(
                'success_message',
                'Le chapitre a bien été publié'
            );
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * @param string $articleId
     */
    public function unpublishArticle(string $articleId)
    {
        if ($this->checkAdmin()) {
            $this->articleDAO->editPublicationStatus(0, $articleId);
            $this->session->set(
                'success_message',
                'Le chapitre a bien été dépublié'
            );
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * @param string $articleId
     */
    public function deleteArticle(string $articleId)
    {
        if ($this->checkAdmin()) {
            $commentsToDelete = $this->commentDAO->getCommentsFromArticle($articleId);
            foreach ($commentsToDelete as $comment) {
                $this->deleteComment($comment->getId(), '', '');
            }
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set(
                'success_message',
                'L\'article a bien été supprimé'
            );
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * @param Parameter $post
     * @param string $articleId
     * @return View
     */
    public function addComment(Parameter $post, string $articleId)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Comment');
                if (!$errors) {
                    $this->commentDAO->addComment(
                        $post,
                        $this->session->get('user')->getId(),
                        $this->session->get('user')->getPseudo(),
                        $articleId
                    );
                    $this->session->set(
                        'success_message',
                        'Votre commentaire a bien été ajouté'
                    );
                }
                $article = $this->articleDAO->getArticle($articleId, true);
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

    /**
     * @param string $commentId
     */
    public function unflagComment(string $commentId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set(
                'success_message',
                'Le commentaire a bien été désignalé'
            );
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * @param string $commentId
     * @param string $articleId
     * @param string $pseudo
     */
    public function deleteComment(string $commentId, string $articleId, string $pseudo)
    {
        if (
            $this->checkLoggedIn()
            && $this->session->get('user')->getPseudo() === $pseudo
        ) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set(
                'success_message',
                'Votre commentaire a bien été supprimé'
            );
            header('Location: ../public/index.php?route=viewArticle&articleId='.$articleId);
        } elseif ($this->checkAdmin()) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set(
                'success_message',
                'Le commentaire a bien été supprimé'
            );
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * @return View
     */
    public function profile()
    {
        if ($this->checkLoggedIn()) {
            $user = $this->userDAO->getUser($this->session->get('user')->getPseudo());
            return $this->view->render('profile', [
                'user' => $user
            ]);
        }
    }

    /**
     * @param Parameter $post
     * @return View
     */
    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $post->set('pseudo', $this->session->get('user')->getPseudo());
                $checkCurrentPassword = $this->userDAO->checkPassword($post, 'pseudo');
                if ($checkCurrentPassword) {
                    $errors = $this->validation->validate($post, 'User');
                    if (!$errors) {
                        $this->userDAO->updatePassword($post, $this->session->get('user')->getPseudo());
                        $this->session->set(
                            'success_message',
                            'Votre mot de passe a été mis à jour'
                        );
                    }
                    return $this->view->render('update_password', [
                        'errors' => $errors
                    ]);
                }
                $this->session->set(
                    'error_message',
                    'Le mot de passe actuel est incorrect'
                );
            }
            return $this->view->render('update_password');
        }
    }

    /**
     * @param Parameter $post
     * @return View
     */
    public function updateEmail(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submitEmail')) {
                $errors = $this->validation->validate($post, 'User');
                if (!$errors) {
                    $this->userDAO->updateEmail($post, $this->session->get('user')->getPseudo());
                    $this->session->set(
                        'success_message',
                        'Votre adresse e-mail a été mise à jour'
                    );
                }

                return $this->view->render('profile', [
                    'user' => $this->session->get('user'),
                    'errors' => $errors
                ]);
            }
        }
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->logoutOrDelete('logout');
        }
    }

    public function deleteAccount()
    {
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteUser($this->session->get('user')->getId());
            $this->logoutOrDelete('delete_account');
        }
    }

    /**
     * @param string $userId
     */
    public function deleteUser(string $userId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->deleteUserComments($userId);
            $this->userDAO->deleteUser($userId);
            $this->session->set(
                'success_message',
                'L\'utilisateur a bien été supprimé'
            );
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * @param string $param
     */
    private function logoutOrDelete(string $param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->set('info_message', 'À bientôt');
        } else {
            $this->session->set(
                'success_message',
                'Votre compte a bien été supprimé'
            );
        }
        header('Location: ../public/index.php');
    }
}