<?php

namespace App\src\model\DAO;

use App\src\Parameter;
use App\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setUserId($row['userId']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->setFlag($row['flag']);
        $comment->setArticleId($row['article_id']);

        return $comment;
    }
    public function getCommentsFromArticle(string $articleId)
    {
        $sql = 'SELECT id, user_id AS userId, pseudo, content, createdAt, flag, article_id 
                FROM comment 
                WHERE article_id = ? 
                ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $post, string $userId, string $pseudo, string $articleId)
    {
        $sql = 'INSERT INTO comment (user_id, pseudo, content, createdAt, flag, article_id) 
                VALUES (?,?,?,NOW(),?,?)';
        $this->createQuery($sql, [
            $userId,
            $pseudo,
            $post->get('content'),
            0,
            $articleId
        ]);
    }

    public function flagComment(string $commentId)
    {
        $sql = 'UPDATE comment 
                SET flag = ? 
                WHERE id = ?';
        $this->createQuery($sql, [
            1,
            $commentId
        ]);
    }

    public function unflagComment(string $commentId)
    {
        $sql = 'UPDATE comment 
                SET flag = ? 
                WHERE id = ?';
        $this->createQuery($sql, [
            0,
            $commentId
        ]);
    }

    public function deleteComment(string $commentId)
    {
        $sql = 'DELETE 
                FROM comment 
                WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    public function deleteUserComments(string $userId)
    {
        $sql = 'DELETE 
                FROM comment 
                WHERE user_id = ?';
        $this->createQuery($sql, [$userId]);
    }

    public function getFlaggedComments()
    {
        $sql = 'SELECT id, user_id AS userId, pseudo, content, createdAt, flag, article_id 
                FROM comment 
                WHERE flag = ? 
                ORDER BY createdAt DESC';
        $result = $this->createQuery($sql,[1]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}