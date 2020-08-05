<?php $this->title = 'Administration'; ?>

<h2>Articles</h2>
<a type="button" class="btn btn-secondary" href="../public/index.php?route=addArticle">Nouvel article</a>
<table class="table table-hover">
    <thead>
        <th scope="col">Numéro du chapitre</th>
        <th scope="col">Statut</th>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Date de création</th>
        <th scope="col">Dernière publication</th>
        <th scope="col">Actions</th>
    </thead>
    <?php
    foreach ($articles as $article)
    {
    ?>
        <tr>
            <th  scope="row">
                <?= htmlspecialchars($article->getOrderNum()); ?>
            </th>
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
            <td>
                <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>">
                    <?= htmlspecialchars($article->getTitle()); ?>
                </a>
            </td>
            <td>
                <?= substr(strip_tags($article->getContent()), 0, 150); ?>
            </td>
            <td>
                <?= htmlspecialchars($article->getAuthor()); ?>
            </td>
            <td>
                <?= htmlspecialchars($article->getCreatedAt()); ?>
            </td>
            <td>
                <?php
                    // Avoid default '01/01/1970' display if date is null
                    if (!is_null($article->getLastPublishedDate())) {
                ?>
                        <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate()))); ?>
                <?php
                    }
                ?>

            </td>
            <td>
                <a type="button" class="btn btn-primary" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                    Modifier
                </a>
                <a type="button" class="btn btn-danger" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">
                    Supprimer
                </a>
                <?php
                if($article->getIsPublished() == 0)
                {
                ?>
                    <a type="button" class="btn btn-success" href="../public/index.php?route=publishArticle&articleId=<?= $article->getId(); ?>">
                        Publier
                    </a>
                <?php
                }
                elseif ($article->getIsPublished() == 1)
                {
                ?>
                    <a type="button" class="btn btn-warning" href="../public/index.php?route=unpublishArticle&articleId=<?= $article->getId(); ?>">
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

<h2>Commentaires signalés</h2>
<table class="table table-hover">
    <thead>
        <th scope="col">Id</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Message</th>
        <th scope="col">Date de création</th>
        <th scope="col">Actions</th>
    </thead>
    <?php
    foreach($comments as $comment)
    {
    ?>
        <tr>
            <th scope="row">
                <?= htmlspecialchars($comment->getId()); ?>
            </th>
            <td>
                <?= htmlspecialchars($comment->getPseudo()); ?>
            </td>
            <td>
                <?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?>
            </td>
            <td>
                <?= htmlspecialchars($comment->getCreatedAt()); ?>
            </td>
            <td>
                <a type="button" class="btn btn-primary" href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">
                    Désignaler le commentaire
                </a>
                <a type="button" class="btn btn-danger" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">
                    Supprimer le commentaire
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>


<h2>Utilisateurs</h2>
<table class="table table-hover">
    <thead>
        <th scope="col">Id</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Email</th>
        <th scope="col">Date de création</th>
        <th scope="col">Rôle</th>
        <th scope="col">Actions</th>
    </thead>
    <?php
    foreach($users as $user)
    {
    ?>
        <tr>
            <th scope="row">
                <?= htmlspecialchars($user->getId()); ?>
            </th>
            <td>
                <?= htmlspecialchars($user->getPseudo()); ?>
            </td>
            <td>
                <a href="mailto:<?= htmlspecialchars($user->getEmail()); ?>">
                    <?= htmlspecialchars($user->getEmail()); ?>
                </a>
            </td>
            <td>
                <?= htmlspecialchars($user->getCreatedAt()); ?>
            </td>
            <td>
                <?= htmlspecialchars($user->getRole()); ?>
            </td>
            <td>
                <?php
                if(!$user->getIsAdmin())
                {
                ?>
                    <a type="button" class="btn btn-danger" href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">
                        Supprimer
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