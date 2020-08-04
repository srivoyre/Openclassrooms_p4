<?php $this->title = 'Modifier mon mot de passe'; ?>

<div>
    <p>Le mot de passe de <span class="bold"><?= $this->session->get('user')->getPseudo(); ?></span> sera modifié</p>
    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password">Nouveau mot de passe</label>
        <br />
        <input type="password" id="password" name="password">
        <br />
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>

<a href="../public/index.php?route=profile"><< Retour au profil</a>
