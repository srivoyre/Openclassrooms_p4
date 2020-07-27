<?php

class Comment extends Database
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE post_id = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$postId]);
    }

}