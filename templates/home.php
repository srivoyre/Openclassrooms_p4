<?php $this->title = "Accueil"; ?>

<?= $this->session->show('register_message'); ?>
<?= $this->session->show('login_message'); ?>
<?= $this->session->show('logout_message'); ?>
<?= $this->session->show('delete_user_message'); ?>
<?= $this->session->show('delete_account_message'); ?>

<?php
foreach ($articles as $article) {
?>
    <div>
        <h2>
            <a href="../public/index.php?route=viewArticle&articleId=<?=htmlspecialchars($article->getId());?>">
                <?= htmlspecialchars($article->getTitle());?>
            </a>
        </h2>
        <p>
            <?= $article->getContent();?>
        </p>
        <p>
            Publié le : <?= htmlspecialchars($article->getLastPublishedDate());?>
        </p>
    </div>
    <br />
<?php
}
?>