<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Article;

class ArticleDAO extends DAO
{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['pseudo']);
        $article->setCreatedAt($row['createdAt']);
        $article->setOrder($row['order_num']);
        $article->setNextArticleId($this->getNextArticle($article->getOrder()));
        $article->setPreviousArticleId($this->getPreviousArticle($article->getOrder()));

        return $article;
    } 
    
    public function getArticles()
    {
        $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, user.pseudo FROM article INNER JOIN user ON article.user_id = user.id ORDER BY article.id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row)
        {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();

        return $articles;
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, user.pseudo FROM article INNER JOIN user ON article.user_id WHERE article.id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    public function getNextArticle($articleOrderNum)
    {
        $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, user.pseudo FROM article INNER JOIN user ON article.user_id WHERE order_num > ? ORDER BY order_num ASC LIMIT 1';
        $result = $this->createQuery($sql, [$articleOrderNum]);
        $articleId= 0;
        foreach ($result as $row)
        {
            $articleId = $row['id'];
            var_dump($articleId);
        }
        $result->closeCursor();

        return $articleId;
    }

    public function getPreviousArticle($articleOrderNum)
    {
        $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, user.pseudo FROM article INNER JOIN user ON article.user_id WHERE order_num < ? ORDER BY order_num DESC LIMIT 1';
        $result = $this->createQuery($sql, [$articleOrderNum]);
        $articleId= 0;
        foreach ($result as $row)
        {
            $articleId = $row['id'];
            var_dump($articleId);
        }
        $result->closeCursor();

        return $articleId;
    }

    public function addArticle(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO article (title, content, order_num, createdAt, user_id) VALUES(?,?,?,NOW(),?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $post->get('order_num'), $userId]);
    }

    public function editArticle(Parameter $post, $articleId, $userId)
    {
        $sql = 'UPDATE article SET title=:title, content=:content, order_num=:order_num, user_id=:user_id WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'order_num' => $post->get('order_num'),
            'user_id' => $userId,
            'articleId' => $articleId
        ]);
    }

    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_id = ?';
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE FROM article WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }
}