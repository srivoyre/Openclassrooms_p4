<?php $this->title = "Article"; ?>

<h1>Mon blog</h1>
<p>En construction</p>

<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('unflag_comment'); ?>

<div>
    <h2>
        <?= htmlspecialchars($article->getTitle());?>
    </h2>
    <p>
        <?= $article->getContent();?>
    </p>
    <p>
        <?= htmlspecialchars($article->getAuthor());?>
    </p>
    <p>
        Crée le : <?= htmlspecialchars($article->getCreatedAt());?>
    </p>
</div>

<br />
<?php
    if(($this->session->get('role') === 'admin'))
    {
        ?>
        <div class="actions">
            <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
            <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
        </div>
        <?php
    }
?>


<br />

<div id="comments" class="text-left" style="margin-left: 50px;">
    <h3>Ajouter un commentaire</h3>
    <?php include('form_comment.php'); ?>
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4>
            <?= htmlspecialchars($comment->getPseudo());?>
        </h4>
        <p>
            <?= htmlspecialchars($comment->getContent());?>
        </p>
        <p>
            Posté le <?=htmlspecialchars($comment->getCreatedAt());?>
        </p>
        <?php
        if($comment->isFlag())
        {
        ?>
            <p>
                Ce commentaire a déjà été signalé
            </p>
        <?php
        } else
        {
        ?>
            <p>
                <a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>">
                    Signaler le commentaire
                </a>
            </p>
        <?php
        }
        ?>
        <p>
            <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">
                Supprimer le commentaire
            </a>
        </p>
        <?php
   }
   ?>
</div>