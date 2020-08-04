<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{
    public function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setCreatedAt($row['createdAt']);
        $user->setRole($row['roleName']);
        $user->setEmail($row['email']);
        $user->setNumberOfComments($this->countComments($user->getPseudo()));
        $user->setIsAdmin($row['roleId']);

        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT user.id, user.pseudo, user.createdAt, role.id AS roleId, role.name AS roleName, user.email FROM user INNER JOIN role ON role.id = user.role_id ORDER BY user.id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row)
        {
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function getUser($pseudo)
    {
        $sql = 'SELECT user.id, user.pseudo, user.createdAt, role.id AS roleId, role.name AS roleName, user.email FROM user INNER JOIN role ON role.id = user.role_id WHERE user.pseudo = ? ORDER BY user.id DESC';
        $result = $this->createQuery($sql, [$pseudo]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($user);
    }

    public function register(Parameter $post)
    {
        $sql = 'INSERT INTO user (pseudo, password, createdAt, role_id, email) VALUES (?,?,NOW(),?,?)';
        $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT), 2, $post->get('email')]);
    }

    public function checkUser(Parameter $post, $valueToCheck, $fieldToCheck, $param)
    {
        $sql = '';
        if($fieldToCheck === 'pseudo')
        {
            $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        }
        elseif($fieldToCheck === 'email')
        {
            $sql = 'SELECT COUNT(email) FROM user WHERE email = ?';
        }
        $result = $this->createQuery($sql, [$post->get($valueToCheck)]);
        $isUnique = $result->fetchColumn();
        if($param === 'register') {
            if ($isUnique) {
                return '<p>Ce pseudo n\'est pas disponible</p>';
            }
        }
        elseif($param === 'login')
        {
            return $isUnique;
        }
    }

    public function checkPassword(Parameter $post, $field)
    {
        if($field === 'pseudo')
        {
            $sql = 'SELECT user.id, user.pseudo, user.password, user.role_id AS roleId, role.name AS roleName, user.email, user.createdAt FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = ?';
        }
        elseif($field === 'email')
        {
            $sql = 'SELECT user.id, user.pseudo, user.password, user.role_id AS roleId, role.name AS roleName, user.email, user.createdAt FROM user INNER JOIN role ON role.id = user.role_id WHERE email = ?';
        }
        $data = $this->createQuery($sql, [$post->get('username')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);

        if($isPasswordValid) {
            return [
                'result' => $result,
                'isPasswordValid' => $isPasswordValid,
                'user' => $this->buildObject($result)
            ];
        }
    }

    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    public function updateEmail(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET email = ? WHERE pseudo = ?';
        $this->createQuery($sql, [$post->get('email'), $pseudo]);
    }

    public function deleteAccount($pseudo)
    {
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }

    public function countComments($pseudo)
    {
        $sql = 'SELECT COUNT(id) FROM comment WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$pseudo]);
        return $result->fetchColumn();
    }
}