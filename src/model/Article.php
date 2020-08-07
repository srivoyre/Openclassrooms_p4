<?php

namespace App\src\model;

use Cassandra\Date;

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
    private $lastPublishedDate;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setAuthor($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return date('d/m/Y H:i', strtotime($this->createdAt));
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getOrderNum()
    {
        return $this->order_num;
    }

    /**
     * @param int $order_num
     */
    public function setOrderNum($order_num)
    {
        $this->order_num = $order_num;
    }

    /**
     * @return Article
     */
    public function getPreviousArticle()
    {
        return $this->previousArticle;
    }

    /**
     * @param Article $previousArticle
     */
    public function setPreviousArticle($previousArticle)
    {
        $this->previousArticle = $previousArticle;
    }

    /**
     * @return Article
     */
    public function getNextArticle()
    {
        return $this->nextArticle;
    }

    /**
     * @param Article $nextArticle
     */
    public function setNextArticle($nextArticle)
    {
        $this->nextArticle = $nextArticle;
    }

    /**
     * @return bool
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * @param bool $is_published
     */
    public function setIsPublished($is_published)
    {
        $this->is_published = $is_published;
    }

    /**
     * @return string
     */
    public function getLastPublishedDate()
    {
        return $this->lastPublishedDate;
    }

    /**
     * @param Date $lastPublishedDate
     */
    public function setLastPublishedDate($lastPublishedDate)
    {
        $this->lastPublishedDate = $lastPublishedDate;
    }

}