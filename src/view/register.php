<?php $this->title = "Inscription"; ?>

<div>
    <form method="post" action="../public/index.php?route=register">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <br />
            <input class="form-control" type="text" id="pseudo" name="pseudo">
            <br />
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        </div>
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <br />
            <input class="form-control" type="email" id="email" name="email" aria-label="Username" aria-describedby="basic-addon1">
            <br />
            <?= isset($errors['email']) ? $errors['email'] : ''; ?>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <br />
            <input class="form-control" type="password" id="password" name="password">
            <br />
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <input class="btn btn-primary"  type="submit" value="Inscription" id="submit" name="submit">
    </form>

    <a type="button" class="btn btn-primary" href="../public/index.php?route=login">J'ai déjà un compte</a>
    <a type="button" class="btn btn-secondary" href="../public/index.php">Retour à l'accueil</a>
</div>
