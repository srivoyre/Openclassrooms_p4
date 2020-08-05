<?php $this->title = "Connexion" ;?>

<div>
    <form method="post" action="../public/index.php?route=login">
        <div class="form-group">
            <label for="pseudo">Pseudo ou e-mail</label>
            <br />
            <input class="form-control" type="text" id="pseudo" name="pseudo">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <br />
            <input class="form-control" type="password" id="password" name="password">
        </div>
        <input class="btn btn-primary"  type="submit" value="Connexion" id="submit" name="submit">
    </form>

    <a type="button" class="btn btn-primary" href="../public/index.php?route=register">Vous n'avez pas encore de compte ?</a>

    <a type="button" class="btn btn-secondary" href="../public/index.php">Retour à l'accueil</a>
</div>
