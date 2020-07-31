<?php $this->title = 'Administration'; ?>

<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('publish_article'); ?>
<?= $this->session->show('unpublish_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>

<h2>Articles</h2>
<a href="../public/index.php?route=addArticle">Nouvel article</a>
<table>
    <thead>
        <th>Numéro du chapitre</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Auteur</th>
        <th>Date de création</th>
        <th>Publié le</th>
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
                <?= htmlspecialchars($article->getLastPublishedDate()); ?>
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
        <th>Date</th>
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
                Crée le : <?= htmlspecialchars($comment->getCreatedAt()); ?>
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
        <th>Date</th>
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
                Crée le : <?= htmlspecialchars($user->getCreatedAt()); ?>
            </td>
            <td>
                <?= htmlspecialchars($user->getRole()); ?>
            </td>
            <td>
                <?php
                if($user->getRole() != 'admin')
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