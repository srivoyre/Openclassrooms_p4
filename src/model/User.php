<?php

namespace App\src\model;

class User
{
    private $id;
    private $pseudo;
    private $password;
    private $createdAt;
    private $role;
    private $email;
    private $numberOfComments;
    private $isAdmin;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return date('d/m/Y', strtotime($this->createdAt));
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNumberOfComments()
    {
        return $this->numberOfComments;
    }

    /**
     * @param mixed $numberOfComments
     */
    public function setNumberOfComments($numberOfComments)
    {
        $this->numberOfComments = $numberOfComments;
    }

    /**
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param boolean $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        if($this->getRole() === '1')
        {
            $this->isAdmin = true;
        }
        else
        {
            $this->isAdmin = false;
        }
    }

}