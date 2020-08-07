<?php $this->title = 'Mon profil'; ?>
<?php $loggedIn = isset($this->session) && $this->session->get('user')->getPseudo(); ?>

<div class="message">
    <?php

    if ($this->session->get('info_message')) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= $this->session->show('info_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } elseif ($this->session->get('success_message')) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->show('success_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } elseif ($this->session->get('warning_message')) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->show('warning_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } elseif ($this->session->get('error_message')) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->show('error_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
</div>

<div class="row">
    <div class="col-12">
        <h1><?= $user->getPseudo(); ?></h1>
        <p>Membre depuis le <?= $user->getCreatedAt(); ?></p>
        <p>Nombre de commentaires en ligne : <?= $user->getNumberOfComments(); ?></p>

        <form method="post" action="../public/index.php?route=updateEmail">
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="email">E-mail :</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 pb-2">
                        <input class="form-control" type="email" id="email" name="email" aria-label="E-mail" value="<?= htmlspecialchars($user->getEmail()); ?>" required aria-required="true">
                    </div>
                    <div class="col-12 col-md-4 pb-2">
                        <input class="btn btn-primary" type="submit" value="Mettre à jour mon e-mail" id="submitEmail" name="submitEmail">
                    </div>
                </div>

            </div>
        </form>

        <div class="row mt-5">
            <div class="col-6 col-md-3 text-center text-md-left">
                <a type="button" class="btn btn-outline-primary btn-block" href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
            </div>
            <div class="col-6 col-md-3 text-center text-md-left">
                <a type="button" class="btn btn-outline-danger btn-block" href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
            </div>
        </div>
    </div>

</div>

