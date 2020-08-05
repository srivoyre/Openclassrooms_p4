<?php $this->title = "Inscription"; ?>

<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="pseudo">Pseudo</label>
        <br />
        <input type="text" id="pseudo" name="pseudo">
        <br />
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="email">Adresse e-mail</label>
        <br />
        <input type="email" id="email" name="email">
        <br />
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>
        <label for="password">Mot de passe</label>
        <br />
        <input type="password" id="password" name="password">
        <br />
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>

    <a type="button" class="btn btn-primary" href="../public/index.php?route=login">J'ai déjà un compte</a>
    <a type="button" class="btn btn-secondary" href="../public/index.php">Retour à l'accueil</a>
</div>
