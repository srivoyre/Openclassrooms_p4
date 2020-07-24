<?php

class Post extends Database
{
    public function getPosts()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM post ORDER BY id DESC';
        return $this->createQuery($sql);
    }

    public function getPost($postId)
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM post WHERE id = ?';
        return $this->createQuery($sql, [$postId]);
    }
}