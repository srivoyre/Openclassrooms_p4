<?php

namespace App\src\model\DAO;

use App\src\Parameter;
use App\src\model\Comment;

/**
 * Class CommentDAO
 * @package App\src\model\DAO
 */
class CommentDAO extends DAO
{
    /**
     * @param array $row
     * @return Comment
     */
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

    /**
     * @param string $articleId
     * @return array
     */
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

    /**
     * @param Parameter $post
     * @param string $userId
     * @param string $pseudo
     * @param string $articleId
     */
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

    /**
     * @param string $commentId
     */
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

    /**
     * @param string $commentId
     */
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

    /**
     * @param string $commentId
     */
    public function deleteComment(string $commentId)
    {
        $sql = 'DELETE 
                FROM comment 
                WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    /**
     * @param string $userId
     */
    public function deleteUserComments(string $userId)
    {
        $sql = 'DELETE 
                FROM comment 
                WHERE user_id = ?';
        $this->createQuery($sql, [$userId]);
    }

    /**
     * @return array
     */
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