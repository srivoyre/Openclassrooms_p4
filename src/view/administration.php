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
                <?= filter_var($article->getOrderNum(), FILTER_SANITIZE_NUMBER_INT); ?>
            </th>
            <td>
                <a href="index.php?route=article&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
                    <?= filter_var($article->getTitle(), FILTER_SANITIZE_SPECIAL_CHARS); ?>
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
                    <?= filter_var(substr($article->getContent(), 0, 150),FILTER_SANITIZE_STRING); ?>
                </span>
                <span class="font-italic d-block d-lg-none">
                    Aperçu du chapitre indisponible
                </span>
            </td>
            <td>
                <?= filter_var($article->getAuthor(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </td>
            <td>
                <?= filter_var($article->getCreatedAt(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </td>
            <td>
                <?php
                // Avoid default '01/01/1970' display if date is null
                if (!is_null($article->getLastPublishedDate())) {
                ?>
                    <?= filter_var(date('d/m/Y', strtotime($article->getLastPublishedDate())), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
                <?php
                }
                ?>

            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <div class="d-flex flex-row justify-content-end">
                    <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="index.php?route=editArticle&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="index.php?route=deleteArticle&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
                <?php
                if($article->getIsPublished() == 0)
                {
                    ?>
                    <a type="button" class="btn btn-outline-success btn-block mb-1 mx-1" href="index.php?route=publishArticle&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
                        Publier
                    </a>
                    <?php
                }
                elseif ($article->getIsPublished() == 1)
                {
                    ?>
                    <a type="button" class="btn btn-outline-warning btn-block mb-1 mx-1" href="index.php?route=unpublishArticle&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
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
                <?= filter_var($comment->getPseudo(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </th>
            <td class="text-break">
                <?= filter_var($comment->getContent(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </td>
            <td>
                <?= filter_var($comment->getCreatedAt(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="index.php?route=unflagComment&commentId=<?= filter_var($comment->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
                    Désignaler
                </a>
                <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="index.php?route=deleteComment&commentId=<?= filter_var($comment->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
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
                <?= filter_var($user->getPseudo(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </th>
            <td>
                <a href="mailto:<?= filter_var($user->getEmail(),FILTER_SANITIZE_EMAIL); ?>">
                    <?= filter_var($user->getEmail(),FILTER_SANITIZE_EMAIL); ?>
                </a>
            </td>
            <td>
                <?= filter_var($user->getCreatedAt(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </td>
            <td>
                <?= filter_var($user->getRole(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>
            </td>
            <td class="d-flex flex-wrap justify-content-end">
                <?php
                if(!$user->getIsAdmin())
                {
                    ?>
                    <a type="button" class="btn btn-outline-danger" href="index.php?route=deleteUser&userId=<?= filter_var($user->getId(), FILTER_SANITIZE_NUMBER_INT); ?>">
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
