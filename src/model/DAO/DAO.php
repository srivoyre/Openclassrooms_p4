<?php

namespace App\src\model\DAO;

use App\src\controller\ErrorController;
use PDO;
use Exception;

/**
 * Class DAO
 * @package App\src\model\DAO
 */
abstract class DAO
{
    private $connection;

    /**
     * @return PDO
     */
    private function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }

        return $this->connection;
    }

    /**
     * @return PDO
     */
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

    /**
     * @param string $sql
     * @param null $parameters
     * @return bool|false|\PDOStatement
     */
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