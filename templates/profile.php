<?php $this->title = 'Mon profil'; ?>

<?= $this->session->show('update_password'); ?>
<?= $this->session->show('not_admin'); ?>

<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <p>Membre depuis le <?= $user->getCreatedAt(); ?></p>
    <a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<a href="../public/index.php">Retour à l'accueil</a>
