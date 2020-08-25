<?php $this->title = "500 Error: Internal server error"; ?>

<a type="button" class="btn btn-light mb-5" href="index.php"><< Retour à l'accueil</a>

<h1>
    <?= filter_var($this->title); ?>
</h1>

<p>
    Oups ! Une erreur est survenue, veuillez rechargez la page ou revenir à l'accueil.
</p>
