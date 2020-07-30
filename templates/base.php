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
                if($this->session->get('role') === 'admin') {
                ?>
                <a href="../public/index.php?route=administration">Administration</a>
                <?php
                }
            ?>
                <a href="../public/index.php?route=profile">Profil</a>
                <a href="../public/index.php?route=logout">Déconnexion</a>
            <?php
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

        <div>
            <h1>
                <?= $title ?>
            </h1>

            <?php
            //$previouspagehome = substr($_SERVER['HTTP_REFERER'], -9, 9) === 'index.php';
            //$previouspagehome = substr($_SERVER['HTTP_REFERER'], -9, 9) === 'administration';
            var_dump($this->session->get('pseudo'));
            ?>

            <?= $this->session->show('add_article'); ?>
            <?= $this->session->show('edit_article'); ?>
            <?= $this->session->show('delete_article'); ?>
            <?= $this->session->show('add_comment'); ?>
            <?= $this->session->show('flag_comment'); ?>
            <?= $this->session->show('unflag_comment'); ?>
            <?= $this->session->show('delete_comment'); ?>
            <?= $this->session->show('register'); ?>
            <?= $this->session->show('login'); ?>
            <?= $this->session->show('logout'); ?>
            <?= $this->session->show('delete_user'); ?>
            <?= $this->session->show('delete_account'); ?>
            <?= $this->session->show('error_login'); ?>
            <?= $this->session->show('need_login'); ?>
            <?= $this->session->show('update_password'); ?>
            <?= $this->session->show('not_admin'); ?>

        </div>

        <div id="content">

            <?= $content ?>
        </div>

    </body>
</html>