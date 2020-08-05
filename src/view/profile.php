<?php $this->title = 'Mon profil'; ?>

<?php $loggedIn = isset($this->session) && $this->session->get('user')->getPseudo(); ?>

<div class="alert alert-success" role="alert">
    <?= $this->session->show('update_email_message'); ?>
    <?= $this->session->show('update_password_message'); ?>
</div>
<div class="alert alert-warning" role="alert">
    <?= $this->session->show('not_admin_message'); ?>
</div>

<div>
    <h2><?= $user->getPseudo(); ?></h2>
    <p>Membre depuis le <?= $user->getCreatedAt(); ?></p>
    <p>Nombre de commentaires en ligne : <?= $user->getNumberOfComments(); ?></p>

    <form method="post" action="../public/index.php?route=updateEmail">
        <label for="email">E-mail</label>
        <br />
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()); ?>">
        <br />
        <input type="submit" value="Mettre à jour mon e-mail" id="submitEmail" name="submitEmail">
    </form>

    <a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<a href="../public/index.php">Retour à l'accueil</a>
