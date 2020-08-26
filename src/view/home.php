<?php $this->title = "Billet simple pour l'Alaska"; ?>

<div class="row mt-4">
    <div class="col-md-1 col-lg-2"></div>
    <div class="col-md-10 col-lg-8">
        <h1 class="d-none">
            Tous les chapitres
        </h1>

        <?php
        foreach ($articles as $article) {
            ?>
            <div class="card">
                <h2 class="card-header">
                    Chapitre <?= filter_var($article->getOrderNum(), FILTER_SANITIZE_NUMBER_INT	);?>
                </h2>
                <div class="card-body">
                    <h3 class="card-title"><?= filter_var($article->getTitle(), FILTER_SANITIZE_FULL_SPECIAL_CHARS);?></h3>
                    <p class="card-text">
                        <?= filter_var(substr($article->getContent(), 0, 300),FILTER_SANITIZE_STRING); ?>...
                        <span class="font-weight-bold font-italic">
                            Publié le <?= filter_var(date('d/m/Y', strtotime($article->getLastPublishedDate())),FILTER_SANITIZE_FULL_SPECIAL_CHARS);?>
                        </span>
                    </p>
                    <a href="index.php?route=viewArticle&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_NUMBER_INT);?>" class="btn btn-info">
                        Lire ce chapitre
                    </a>
                </div>
            </div>
            <br />
            <?php
        }
        ?>
    </div>
    <div class="col-md-1 col-lg-2"></div>
</div>