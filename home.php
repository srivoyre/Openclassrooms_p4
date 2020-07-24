<?php

// on inclut ici le fichier dont on a besoin (ici à la racine de notre site)

require 'Database.php';

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon blog</title>
    </head>

    <body>
        <div>
            <h1>Mon blog</h1>
            <p>En construction</p>
            <?php

            // on crée un nouvel objet $db, qui est une instance de la classe Database

            $db = new Database();

            // on fait appel à notre méthode getConnection()

            echo $db->getConnection();
            ?>
        </div>
    </body>
</html>