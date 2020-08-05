<?php $this->title = 'Mon profil'; ?>

<?php $loggedIn = isset($this->session) && $this->session->get('user')->getPseudo(); ?>

<div>
    <h2><?= $user->getPseudo(); ?></h2>
    <p>Membre depuis le <?= $user->getCreatedAt(); ?></p>
    <p>Nombre de commentaires en ligne : <?= $user->getNumberOfComments(); ?></p>

    <form method="post" action="../public/index.php?route=updateEmail">
        <div class="form-group">
            <label for="email">E-mail</label>
            <br />
            <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()); ?>">
        </div>
        <input class="btn btn-primary" type="submit" value="Mettre à jour mon e-mail" id="submitEmail" name="submitEmail">
    </form>

    <a type="button" class="btn btn-primary" href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
    <a type="button" class="btn btn-danger" href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<a type="button" class="btn btn-secondary" href="../public/index.php">Retour à l'accueil</a>
