<?php

namespace App\src\DAO;

class CommentDAO extends DAO
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE post_id = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$postId]);
    }

}