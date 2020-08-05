<?php $this->title = "Accueil"; ?>

<div class="alert alert-info" role="alert">
    <?= $this->session->show('register_message'); ?>
    <?= $this->session->show('login_message'); ?>
    <?= $this->session->show('logout_message'); ?>
    <?= $this->session->show('delete_user_message'); ?>
    <?= $this->session->show('delete_account_message'); ?>
</div>

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
            <?= substr(strip_tags($article->getContent()), 0, 150); ?>
        </p>
        <p>
            Publié le : <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate())));?>
        </p>
    </div>
    <br />
<?php
}
?>