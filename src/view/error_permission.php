<?php $this->title = "Privilèges insuffisants"; ?>

<div class="alert alert-warning" role="alert">
    <?= $this->session->show('not_admin_message'); ?>
</div>

<a href="../public/index.php"><< Retour à l'accueil</a>