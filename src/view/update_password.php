<?php $this->title = 'Modifier mon mot de passe'; ?>

<div class="row my-2">
    <div class="col-12 mx-0">
        <a href="../public/index.php?route=profile">
            << Retour au profil
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h1>Modifier mon mot de passe</h1>
        <div>
            Le mot de passe de <span class="bold"><?= $this->session->get('user')->getPseudo(); ?></span> sera modifié
        </div>

        <form method="post" action="../public/index.php?route=updatePassword">
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="password">Nouveau mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 pb-2">
                        <input class="form-control" type="password" id="password" name="password"><?= isset($errors['password']) ? $errors['password'] : ''; ?>

                    </div>
                    <div class="col-12 col-md-4 pb-2">
                        <input class="btn btn-primary"  type="submit" value="Mettre à jour" id="submit" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
