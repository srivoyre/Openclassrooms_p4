<?php $this->title = 'Mon profil'; ?>

<?php
$loggedIn = isset($this->session) && $this->session->get('pseudo');
?>

<?= $this->session->show('update_email'); ?>
<?= $this->session->show('update_password'); ?>
<?= $this->session->show('not_admin'); ?>

<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <p>Membre depuis le <?= $user->getCreatedAt(); ?></p>
    <p>Nombre de commentaires en ligne : <?= $user->getNumberOfComments(); ?></p>

    <form method="post" action="../public/index.php?route=updateEmail">
        <label for="email">E-mail</label>
        <br />
        <input type="email" id="email" name="email" value="<?= $loggedIn ? htmlspecialchars($user->getEmail()) : ''; ?>">
        <br />
        <input type="submit" value="Mettre à jour mon e-mail" id="submitEmail" name="submitEmail">
    </form>

    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password">Mon mot de passe</label>
        <br />
        <input type="password" id="password" name="password" value="<?= $loggedIn ? htmlspecialchars($user->getPassword()) : ''; ?>">
        <br />
        <input type="submit" value="Mettre à jour mon mot de passe" id="submitPassword" name="submitPassword">
    </form>
    <!--<a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>-->
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<a href="../public/index.php">Retour à l'accueil</a>
