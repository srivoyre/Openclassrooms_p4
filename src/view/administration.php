<?php $this->title = 'Administration'; ?>
<div class="row">
    <div class="row">
        <div class="col-6">
            <h2>Chapitres</h2>
        </div>
        <div class="col-6 text-right">
            <a type="button" class="btn btn-outline-secondary" href="../public/index.php?route=addArticle">
                Nouveau chapitre
            </a>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th class="text-center" scope="col">N°</th>
            <th class="text-center" scope="col">Titre</th>
            <th class="text-center" scope="col">Statut</th>
            <th scope="col">Contenu</th>
            <th class="text-center" scope="col">Auteur</th>
            <th class="text-center" scope="col">Date de création</th>
            <th class="text-center" scope="col">Dernière publication</th>
            <th class="text-right" scope="col">Actions</th>
        </tr>
    </thead>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <th scope="row">
                <?= htmlspecialchars($article->getOrderNum()); ?>
            </th>
            <td>
                <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>">
                    <?= htmlspecialchars($article->getTitle()); ?>
                </a>
            </td>
            <td>
                <?php
                if($article->getIsPublished() == 0)
                {
                    ?>
                    Brouillon
                    <?php
                }
                elseif ($article->getIsPublished() == 1)
                {
                    ?>
                    Publié
                    <?php
                }
                ?>
            </td>
            <td class="">
                <span class="d-none d-md-block">
                    <?= substr(strip_tags($article->getContent()), 0, 150); ?>
                </span>
                <span class="font-italic d-block d-md-none">
                    Aperçu du chapitre indisponible
                </span>
            </td>
            <td class="">
                <span class="font-italic d-block d-md-none">
                    Écrit par
                </span>
                <?= htmlspecialchars($article->getAuthor()); ?>
            </td>
            <td class="">
                <span class="font-italic d-block d-md-none">
                    Date de création :
                </span>
                <?= htmlspecialchars($article->getCreatedAt()); ?>
            </td>
            <td class="">
                <?php
                // Avoid default '01/01/1970' display if date is null
                if (!is_null($article->getLastPublishedDate())) {
                ?>
                    <span class="font-italic d-block d-md-none">
                        Dernière publication le
                    </span>
                    <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate()))); ?>
                <?php
                }
                ?>

            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <?php
                if($article->getIsPublished() == 0)
                {
                    ?>
                    <a type="button" class="btn btn-outline-success mb-1 mx-1" href="../public/index.php?route=publishArticle&articleId=<?= $article->getId(); ?>">
                        Publier
                    </a>
                    <?php
                }
                elseif ($article->getIsPublished() == 1)
                {
                    ?>
                    <a type="button" class="btn btn-outline-warning mb-1 mx-1" href="../public/index.php?route=unpublishArticle&articleId=<?= $article->getId(); ?>">
                        Dépublier
                    </a>
                    <?php
                }
                ?>
                <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<div class="my-5">
    <hr>
</div>

<h2>Commentaires signalés</h2>

<table class="table table-hover table-responsive">
    <thead class="">
        <tr class="">
            <th class="text-center" scope="col">Pseudo</th>
            <th scope="col">Message</th>
            <th scope="col">Date de création</th>
            <th class="text-right" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($comments as $comment)
    {
        ?>
        <tr class="">
            <!--<th class="d-block d-md-none" scope="col">Détails du commentaire signalé :</th>-->
            <td>
                <span class="font-weight-bold">
                    <?= htmlspecialchars($comment->getPseudo()); ?>
                </span>
            </td>
            <td class="text-break">
                <?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?>
            </td>
            <td class="">
                Commentaire posté le : <?= htmlspecialchars($comment->getCreatedAt()); ?>
            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">
                    Désignaler
                </a>
                <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<div class="my-5">
    <hr>
</div>

<h2>Utilisateurs</h2>
<table class="table table-hover">
    <thead>
        <th class="text-center" scope="col">Pseudo</th>
        <!--<th scope="col">Détails</th>-->
        <th scope="col">Email</th>
        <th scope="col">Date de création</th>
        <th scope="col">Rôle</th>
        <th class="text-right" scope="col">Actions</th>
    </thead>
    <?php
    foreach($users as $user)
    {
        ?>
        <tr>
            <td>
                <?= htmlspecialchars($user->getPseudo()); ?>
            </td>
            <td class="">
                <a href="mailto:<?= htmlspecialchars($user->getEmail()); ?>">
                    <?= htmlspecialchars($user->getEmail()); ?>
                </a>
            </td>
            <td class="">
                <?= htmlspecialchars($user->getCreatedAt()); ?>
            </td>
            <td class="">
                <?= htmlspecialchars($user->getRole()); ?>
            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <?php
                if(!$user->getIsAdmin())
                {
                    ?>
                    <a type="button" class="btn btn-outline-danger" href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <?php
                }
                else
                {
                    ?>
                    Suppression impossible
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
