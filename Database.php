<?php
class Database
{
    // connects to local database during local developpment
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    private $connection;

    private function checkConnection()
    {
        if ($this->connection === null)
        {
            return $this->getConnection();
        }

        return $this->connection;
    }

    private function getConnection()
    {
        try 
        {
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;
        }
        catch (Exception $e)
        {
            die('Connection error: ' .$e->getMessage());
        }
    }

    public function createQuery($sql, $parameters = null)
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