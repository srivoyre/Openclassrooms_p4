<?php $this->title = "Accueil"; ?>

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