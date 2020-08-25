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
                    Chapitre <?= filter_var($article->getOrderNum());?>
                </h2>
                <div class="card-body">
                    <h3 class="card-title"><?= filter_var($article->getTitle());?></h3>
                    <p class="card-text">
                        <?= substr(strip_tags($article->getContent(),FILTER_SANITIZE_FULL_SPECIAL_CHARS), 0, 300); ?>...
                        <span class="font-weight-bold font-italic">
                            Publié le <?= filter_var(date('d/m/Y', strtotime($article->getLastPublishedDate())));?>
                        </span>
                    </p>
                    <a href="index.php?route=viewArticle&articleId=<?= filter_var($article->getId());?>" class="btn btn-info">
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