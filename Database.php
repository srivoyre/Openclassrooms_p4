<?php

abstract class Database
{
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

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
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
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
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $result;
    }
}