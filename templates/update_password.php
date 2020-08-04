<?php $this->title = 'Modifier mon mot de passe'; ?>

<div>
    <p>Le mot de passe de <?= $this->session->get('user')->getPseudo(); ?> sera modifié</p>
    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password">Nouveau mot de passe</label>
        <br />
        <input type="password" id="password" name="password">
        <br />
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>

<a href="../public/index.php">Retour à l'accueil</a>
