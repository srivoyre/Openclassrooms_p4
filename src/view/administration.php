<?php $this->title = 'Administration'; ?>
<div class="row">
    <div class="row">
        <div class="col-6">
            <h2>Chapitres</h2>
        </div>
        <div class="col-6 text-right">
            <a type="button" class="btn btn-outline-info" href="index.php?route=addArticle">
                Nouveau chapitre
            </a>
        </div>
    </div>
</div>

<table class="table table-hover table-responsive-lg">
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
                <?= filter_var($article->getOrderNum()); ?>
            </th>
            <td>
                <a href="index.php?route=article&articleId=<?= filter_var($article->getId()); ?>">
                    <?= filter_var($article->getTitle()); ?>
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
            <td class="text-justify">
                <span class="d-none d-lg-block">
                    <?= substr(strip_tags($article->getContent(),FILTER_SANITIZE_FULL_SPECIAL_CHARS), 0, 150); ?>
                </span>
                <span class="font-italic d-block d-lg-none">
                    Aperçu du chapitre indisponible
                </span>
            </td>
            <td>
                <?= filter_var($article->getAuthor()); ?>
            </td>
            <td>
                <?= filter_var($article->getCreatedAt()); ?>
            </td>
            <td>
                <?php
                // Avoid default '01/01/1970' display if date is null
                if (!is_null($article->getLastPublishedDate())) {
                ?>
                    <?= filter_var(date('d/m/Y', strtotime($article->getLastPublishedDate()))); ?>
                <?php
                }
                ?>

            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <div class="d-flex flex-row justify-content-end">
                    <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="index.php?route=editArticle&articleId=<?= filter_var($article->getId()); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="index.php?route=deleteArticle&articleId=<?= filter_var($article->getId()); ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
                <?php
                if($article->getIsPublished() == 0)
                {
                    ?>
                    <a type="button" class="btn btn-outline-success btn-block mb-1 mx-1" href="index.php?route=publishArticle&articleId=<?= filter_var($article->getId()); ?>">
                        Publier
                    </a>
                    <?php
                }
                elseif ($article->getIsPublished() == 1)
                {
                    ?>
                    <a type="button" class="btn btn-outline-warning btn-block mb-1 mx-1" href="index.php?route=unpublishArticle&articleId=<?= filter_var($article->getId()); ?>">
                        Dépublier
                    </a>
                    <?php
                }
                ?>
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

<table class="table table-hover table-responsive-lg">
    <thead>
        <tr>
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
        <tr>
            <th scope="row">
                <?= filter_var($comment->getPseudo()); ?>
            </th>
            <td class="text-break">
                <?= substr(filter_var($comment->getContent(), FILTER_SANITIZE_FULL_SPECIAL_CHARS), 0, 150); ?>
            </td>
            <td>
                <?= filter_var($comment->getCreatedAt()); ?>
            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="index.php?route=unflagComment&commentId=<?= filter_var($comment->getId()); ?>">
                    Désignaler
                </a>
                <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="index.php?route=deleteComment&commentId=<?= filter_var($comment->getId()); ?>">
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
<table class="table table-hover table-responsive-lg">
    <thead>
        <th class="text-center" scope="col">Pseudo</th>
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
            <th scope="row">
                <?= filter_var($user->getPseudo()); ?>
            </th>
            <td>
                <a href="mailto:<?= filter_var($user->getEmail()); ?>">
                    <?= filter_var($user->getEmail()); ?>
                </a>
            </td>
            <td>
                <?= filter_var($user->getCreatedAt()); ?>
            </td>
            <td>
                <?= filter_var($user->getRole()); ?>
            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <?php
                if(!$user->getIsAdmin())
                {
                    ?>
                    <a type="button" class="btn btn-outline-danger" href="index.php?route=deleteUser&userId=<?= filter_var($user->getId()); ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <?php
                }
                else
                {
                    ?>
                    <span class="font-italic">
                        Suppression impossible
                    </span>
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
