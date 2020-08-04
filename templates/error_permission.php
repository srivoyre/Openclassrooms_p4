<?php $this->title = "Privilèges insuffisants"; ?>

<p>
    <?= $this->session->show('not_admin_message'); ?>
</p>

<a href="../public/index.php"><< Retour à l'accueil</a>