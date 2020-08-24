<?php $this->title = "Accueil"; ?>

<div class="row mt-4">
    <div class="col-md-1 col-lg-2"></div>
    <div class="col-md-10 col-lg-8">
        <?php
        foreach ($articles as $article) {
            ?>
            <div class="card">
                <h2 class="card-header">
                    Chapitre <?= htmlspecialchars($article->getOrderNum());?>
                </h2>
                <div class="card-body">
                    <h3 class="card-title"><?= htmlspecialchars($article->getTitle());?></h3>
                    <p class="card-text">
                        <?= substr(strip_tags($article->getContent()), 0, 300); ?>...
                        <span class="font-weight-bold font-italic">
                            Publié le <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate())));?>
                        </span>
                    </p>
                    <a href="../public/index.php?route=viewArticle&articleId=<?=htmlspecialchars($article->getId());?>" class="btn btn-info">
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