<?php
class Database
{
    // connects to local database during local developpment
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    public function getConnection()
    {
        try 
        {
            $connect = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return 'OK';
        }
        catch (Exception $e)
        {
            die('Connection error: ' .$e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Test</title>
    </head>
    <body>
        <div>
        <?php
        $db = new Database();
        echo $db->getConnection();
        ?>
        </div>
    </body>
</html>