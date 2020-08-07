<?php $this->title = "Accueil"; ?>

<div class="row">
    <div class="col-md-1 col-lg-2"></div>
    <div class="col-md-10 col-lg-8">
        <?php
        foreach ($articles as $article) {
            ?>
            <div>
                <h2>
                    <a href="../public/index.php?route=viewArticle&articleId=<?=htmlspecialchars($article->getId());?>">
                        <?= htmlspecialchars($article->getTitle());?>
                    </a>
                </h2>
                <p class="text-justify">
                    <?= substr(strip_tags($article->getContent()), 0, 150); ?>
                </p>
                <div>
                    Publié le : <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate())));?>
                </div>
            </div>
            <br />
            <?php
        }
        ?>
    </div>
    <div class="col-md-1 col-lg-2"></div>
</div>