<?php $this->title = "Connexion"; ?>

<?= $this->session->show('error_login_message'); ?>
<?= $this->session->show('need_login_message'); ?>

<div>
    <form method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label>
        <br />
        <input type="text" id="pseudo" name="pseudo">
        <br />
        <label for="password">Mot de passe</label>
        <br />
        <input type="password" id="password" name="password">
        <br />
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>

    <a href="../public/index.php?route=register">Vous n'avez pas encore de compte ?</a>

    <a href="../public/index.php">Retour à l'accueil</a>
</div>
