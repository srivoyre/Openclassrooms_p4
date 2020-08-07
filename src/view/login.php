<?php $this->title = "Connexion" ;?>
<div class="row">
    <div class="col-12">

        <h1>
            Connexion
        </h1>

        <div class="row">

            <div class="col-12 col-sm-8 col-md-6 col-xl-4">

                <form method="post" action="../public/index.php?route=login">
                    <div class="form-group">
                        <label for="pseudo">Pseudo ou e-mail</label>
                        <br />
                        <input class="form-control" type="text" id="pseudo" name="pseudo" required aria-required="true">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <br />
                        <input class="form-control" type="password" id="password" name="password" required aria-required="true">
                    </div>
                    <input class="btn btn-primary"  type="submit" value="Connexion" id="submit" name="submit">
                </form>
                <div class="row mt-5">
                    <div class="col-6 text-center">
                        <a type="button" class="btn btn-primary" href="../public/index.php?route=register">
                            Je crée un compte
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a type="button" class="btn btn-secondary" href="../public/index.php">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-3 col-xl-4"></div>

            <div class="col-sm-2 col-md-3 col-xl-4"></div>
        </div>

    </div>

</div>
