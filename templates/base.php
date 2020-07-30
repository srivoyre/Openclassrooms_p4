<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>
            <?= $title ?>
        </title>
        <script <?= $script ?> ></script>
    </head>

    <body>

        <header>
            <a href="../public/index.php">Accueil</a>
            <?php
            if($this->session->get('pseudo'))
            {
                ?>
                <a href="../public/index.php?route=logout">Déconnexion</a>
                <a href="../public/index.php?route=profile">Profil</a>
                <?php if($this->session->get('role') === 'admin') { ?>
                <a href="../public/index.php?route=administration">Administration</a>
            <?php }
            }
            else
            {
                ?>
                <a href="../public/index.php?route=register">Inscription</a>
                <a href="../public/index.php?route=login">Connexion</a>
                <?php
            }
            ?>
        </header>

        <div id="content">
            <?= $content ?>
        </div>

    </body>
</html>