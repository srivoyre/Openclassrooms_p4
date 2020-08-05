<?php $this->title = 'Administration'; ?>

<h2>Articles</h2>
<a href="../public/index.php?route=addArticle">Nouvel article</a>
<table>
    <thead>
        <th>Numéro du chapitre</th>
        <th>Statut</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Auteur</th>
        <th>Date de création</th>
        <th>Dernière publication</th>
        <th>Actions</th>
    </thead>
    <?php
    foreach ($articles as $article)
    {
    ?>
        <tr>
            <td>
                <?= htmlspecialchars($article->getOrderNum()); ?>
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
                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                    Modifier
                </a>
                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">
                    Supprimer
                </a>
                <?php
                if($article->getIsPublished() == 0)
                {
                ?>
                    <a href="../public/index.php?route=publishArticle&articleId=<?= $article->getId(); ?>">
                        Publier
                    </a>
                <?php
                }
                elseif ($article->getIsPublished() == 1)
                {
                ?>
                    <a href="../public/index.php?route=unpublishArticle&articleId=<?= $article->getId(); ?>">
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
<table>
    <thead>
        <th>Id</th>
        <th>Pseudo</th>
        <th>Message</th>
        <th>Date de création</th>
        <th>Actions</th>
    </thead>
    <?php
    foreach($comments as $comment)
    {
    ?>
        <tr>
            <td>
                <?= htmlspecialchars($comment->getId()); ?>
            </td>
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
                <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">
                    Désignaler le commentaire
                </a>
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">
                    Supprimer le commentaire
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>


<h2>Utilisateurs</h2>
<table>
    <thead>
        <th>Id</th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Date de création</th>
        <th>Rôle</th>
        <th>Actions</th>
    </thead>
    <?php
    foreach($users as $user)
    {
    ?>
        <tr>
            <td>
                <?= htmlspecialchars($user->getId()); ?>
            </td>
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
                    <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">
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