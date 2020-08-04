<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Article;
use function Sodium\add;

class ArticleDAO extends DAO
{
    private function buildObject(array $row, bool $getSurroundingArticles)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['pseudo']);
        $article->setCreatedAt($row['createdAt']);
        $article->setOrderNum($row['order_num']);
        if($getSurroundingArticles === true)
        {
            $article->setNextArticle(
                $this->getSurroundingArticle($article->getOrderNum(), 'next')
            );
            $article->setPreviousArticle(
                $this->getSurroundingArticle($article->getOrderNum(), 'previous')
            );
        }
        $article->setIsPublished($row['published']);
        $article->setLastPublishedDate($row['lastPublishedDate']);

        return $article;
    } 
    
    public function getArticles(bool $published)
    {
        $sql = '';
        if($published === true)
        {
            $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, article.published, article.lastPublishedDate, user.pseudo 
                    FROM article 
                        INNER JOIN user ON article.user_id = user.id 
                    WHERE article.published = 1 
                    ORDER BY article.order_num DESC, article.createdAt DESC';
        }
        elseif($published === false)
        {
            $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, article.published, article.lastPublishedDate, user.pseudo 
                    FROM article 
                        INNER JOIN user ON article.user_id = user.id 
                    ORDER BY article.order_num DESC, article.createdAt DESC';
        }
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row)
        {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row, false);
        }
        $result->closeCursor();

        return $articles;
    }

    public function getArticle(string $articleId, $published = false)
    {
        $sql = '';
        if($published === true)
        {
            $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, article.published, article.lastPublishedDate, user.pseudo 
                    FROM article 
                        INNER JOIN user ON article.user_id 
                    WHERE article.published = 1 
                        AND article.id = ?';
        }
        elseif($published === false)
        {
            $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, article.published, article.lastPublishedDate, user.pseudo 
                    FROM article 
                        INNER JOIN user ON article.user_id 
                    WHERE article.id = ?';
        }
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article, true);
    }

    public function getSurroundingArticle(int $articleOrderNum, string $place)
    {
        $sql ='';
        if($place === 'next')
        {
            $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, article.published,  article.lastPublishedDate, user.pseudo 
                    FROM article 
                        INNER JOIN user ON article.user_id 
                    WHERE article.order_num > ? 
                      AND article.published = 1 
                    ORDER BY article.order_num ASC 
                    LIMIT 1';
        }
        elseif($place === 'previous')
        {
            $sql = 'SELECT article.id, article.title, article.content, article.order_num, article.createdAt, article.published, article.lastPublishedDate, user.pseudo 
                    FROM article 
                        INNER JOIN user ON article.user_id 
                    WHERE article.order_num < ? 
                        AND article.published = 1 
                    ORDER BY article.order_num DESC 
                    LIMIT 1';
        }
        $result = $this->createQuery($sql, [$articleOrderNum]);
        $articles = [];
        foreach ($result as $row)
        {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row, false);
        }
        $result->closeCursor();
        return array_shift($articles);
    }

    public function addArticle(Parameter $post, string $userId)
    {
        $sql = 'INSERT INTO article (title, content, order_num, published, createdAt, user_id) 
                VALUES(?,?,?,?,NOW(),?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $post->get('order_num'), 0, $userId]);
    }

    public function editArticle(Parameter $post, $articleId, $userId)
    {
        $sql = 'UPDATE article 
                SET title=:title, content=:content, order_num=:order_num, user_id=:user_id 
                WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'order_num' => $post->get('order_num'),
            'user_id' => $userId,
            'articleId' => $articleId
        ]);
    }

    public function editPublicationStatus(int $status, string $articleId)
    {
        $sql = '';
        if($status == 1)
        {
            $sql = 'UPDATE article 
                    SET published=:published, lastPublishedDate= NOW() 
                    WHERE id=:articleId';
        }
        elseif($status == 0)
        {
            $sql = 'UPDATE article 
                    SET published=:published 
                    WHERE id=:articleId';
        }
        $this->createQuery($sql, [
            'published' => $status,
            'articleId' => $articleId
        ]);
    }

    public function deleteArticle(string $articleId)
    {
        $sql = 'DELETE 
                FROM comment 
                WHERE article_id = ?';
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE 
                FROM article 
                WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }
}