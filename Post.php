<?php

class Post
{
    public function getPosts()
    {
        $db = new Database();
        $connection = $db->getConnection();
        $result = $connection->query('SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC');
        return $result;
    }
}