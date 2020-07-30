<?php $this->title = "Accueil"; ?>

<h1>Mon blog</h1>
<p>En construction</p>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_user'); ?>
<?= $this->session->show('delete_account'); ?>

<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2>
            <a href="../public/index.php?route=article&articleId=<?=htmlspecialchars($article->getId());?>">
                <?= htmlspecialchars($article->getTitle());?>
            </a>
        </h2>
        <p>
            <?= $article->getContent();?>
        </p>
        <p>
            <?= htmlspecialchars($article->getAuthor()); ?>
        </p>
        <p>
            Créé le : <?= htmlspecialchars($article->getCreatedAt());?>
        </p>
    </div>
    <br />
    <?php
}
?>