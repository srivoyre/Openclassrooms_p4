<?php

namespace App\src\DAO;

use PDO;
use Exception;

abstract class DAO
{
    private $connection;

    // Checks if there is an existing connection, if not, creates one
    private function checkConnection()
    {
        if($this->connection === null)
        {
            return $this->getConnection();
        }
        return $this->connection;
    }

    // Database connection method
    private function getConnection()
    {
        // We try to connect to the database
        try {
            $connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        }
        // We catch the error if the connection fails
        catch (Exception $errorConnection)
        {
            die('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null)
    {
        if ($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);

        return $result;
    }
}