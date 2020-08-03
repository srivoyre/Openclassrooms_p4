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
        $user->setRole($row['name']);
        $user->setEmail($row['email']);

        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT user.id, user.pseudo, user.createdAt, role.name, user.email FROM user INNER JOIN role ON user.role_id ORDER BY user.id DESC';
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
        $sql = 'SELECT user.id, user.pseudo, user.createdAt, role.name, user.email FROM user INNER JOIN role ON user.role_id WHERE user.pseudo = ? ORDER BY user.id DESC';
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

    public function checkUserPseudo(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique)
        {
            return '<p>Le pseudo existe déjà</p>';
        }
    }
    public function checkUserEmail(Parameter $post)
    {
        $sql = 'SELECT COUNT(email) FROM user WHERE email = ?';
        $result = $this->createQuery($sql, [$post->get('email')]);
        $isUnique = $result->fetchColumn();
        if($isUnique)
        {
            return '<p>Un compte associé à cet e-mail existe déjà ! <a href="../public/index.php?route=login">Je me connecte</a> </p>';
        }
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT user.id, user.role_id, user.password, role.name, user.email FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        // works if password is invalid, doesnt work is pseudo does not exist
        $isPasswordValid = password_verify($post->get('password'), $result['password']);

        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
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
}