<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/style.css">

        <title>
            <?= $title ?>
        </title>
        <!--jQuery, Poppers.js, Bootstrap JS, then custom scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/65eb1404cc.js" crossorigin="anonymous"></script>
        <script src="../../public/js/main.js"></script>
        <script <?= $script ?> ></script>

    </head>

    <body>

        <header>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="../public/index.php">Billet simple pour l'Alaska</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="../public/index.php">Accueil</a>
                        <?php
                        if($this->session->get('loggedIn'))
                        {
                            if($this->session->get('user')->getIsAdmin()) {
                                ?>
                                <a class="nav-link" href="../public/index.php?route=administration">Administration</a>
                                <?php
                            }
                            ?>
                            <a class="nav-link" href="../public/index.php?route=profile">Profil</a>
                            <a class="nav-link" href="../public/index.php?route=logout">Déconnexion</a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a class="nav-link" href="../public/index.php?route=register">Inscription</a>
                            <a class="nav-link" href="../public/index.php?route=login">Connexion</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>

        <div id="messages" class="row">
            <div class="col-3"></div>
            <?php

            if ($this->session->get('info_message')) {
            ?>
                <div class="alert alert-info col-3" role="alert">
                    <?= $this->session->show('info_message') ; ?>
                </div>
            <?php
            } elseif ($this->session->get('success_message')) {
            ?>
                <div class="alert alert-success col-3" role="alert">
                    <?= $this->session->show('success_message') ; ?>
                </div>
            <?php
            } elseif ($this->session->get('warning_message')) {
            ?>
                <div class="alert alert-warning col-3" role="alert">
                    <?= $this->session->show('warning_message') ; ?>
                </div>
            <?php
            } elseif ($this->session->get('error_message')) {
            ?>
                <div class="alert alert-danger col-3" role="alert">
                    <?= $this->session->show('error_message') ; ?>
                </div>
            <?php
            }
            ?>
            <div class="col-3"></div>
        </div>

        <div id="content" class="row mt-4">
            <div class="col-12">
                <?= $content ?>
            </div>
        </div>

    </body>
</html>