<?php

namespace App\src\model;

class Article
{
    private $id;
    private $title;
    private $content;
    private $user_id;
    private $createdAt;
    private $order_num;
    private $nextArticle;
    private $previousArticle;
    private $is_published;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setAuthor($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getOrderNum()
    {
        return $this->order_num;
    }

    /**
     * @param mixed $order_num
     */
    public function setOrderNum($order_num)
    {
        $this->order_num = $order_num;
    }

    /**
     * @return mixed
     */
    public function getPreviousArticle()
    {
        return $this->previousArticle;
    }

    /**
     * @param mixed $previousArticle
     */
    public function setPreviousArticle($previousArticle)
    {
        $this->previousArticle = $previousArticle;
    }

    /**
     * @return mixed
     */
    public function getNextArticle()
    {
        return $this->nextArticle;
    }

    /**
     * @param mixed $nextArticle
     */
    public function setNextArticle($nextArticle)
    {
        $this->nextArticle = $nextArticle;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * @param mixed $is_published
     */
    public function setIsPublished($is_published)
    {
        $this->is_published = $is_published;
    }

}