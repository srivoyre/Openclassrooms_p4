<?php

namespace App\src\model\DAO;

use App\src\controller\ErrorController;
use PDO;
use Exception;

abstract class DAO
{
    private $connection;

    private function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }

        return $this->connection;
    }

    private function getConnection()
    {
        try {
            $connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (Exception $errorConnection) {
            $error = new ErrorController();
            $error->errorServer();
        }
    }

    protected function createQuery(string $sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }

        $result = $this->checkConnection()->query($sql);

        return $result;
    }
}