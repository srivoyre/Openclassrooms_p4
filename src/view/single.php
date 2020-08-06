<?php $this->title = htmlspecialchars($article->getTitle()); ?>

<div class="row">
    <div class="col-6">
        <a type="button" class="btn btn-secondary" href="../public/index.php"><< Accueil</a>
    </div>
    <div class="col-6 text-right">
        <?php
        if (
            $this->session->get('loggedIn')
            && $this->session->get('user')->getIsAdmin()
        ) {
        ?>
            <a  type="button" class="btn btn-primary" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                Modifier
            </a>
        <?php
        }
        ?>
    </div>

</div>

<div class="row container">
        <?= $article->getContent();?>
    <div class="bold">
        Publié le <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate())));?>
    </div>
</div>

<div id="chapters-nav" class="row">
    <div id="previous-chapter" class="col-6">
        <?php
        if (empty($article->getPreviousArticle()) == false) {
        ?>
            <a href="../public/index.php?route=viewArticle&articleId=<?= $article->getPreviousArticle()->getId(); ?>">
                <
            </a>
            Chapitre <?= $article->getPreviousArticle()->getOrderNum(); ?>
        <?php
        }
        ?>
    </div>
    <div id="next-chapter" class="col-6 text-right">
        <?php
        if (empty($article->getNextArticle()) == false) {
        ?>
            Chapitre <?= $article->getNextArticle()->getOrderNum(); ?>
            <a href="../public/index.php?route=viewArticle&articleId=<?= $article->getNextArticle()->getId(); ?>">
                >
            </a>

        <?php
        }
        ?>
    </div>
</div>

<div id="comments-container" class="border border-bottom-0 row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h3>Commentaires</h3>
                <?php
                if ($this->session->get('loggedIn')) {
                    ?>
                    <h4>Ajouter un commentaire</h4>
                    <?php include('form_comment.php'); ?>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="col-12">Vous devez être connecté pour commenter !</div>
                    </div>
                    <div class="row">
                        <div class="col-4 col-sm-3 col-md-2">
                            <a type="button" class="btn btn-primary" href="../public/index.php?route=login">
                                Connexion
                            </a>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a type="button" class="btn btn-primary" href="../public/index.php?route=register">
                                Inscription
                            </a>
                        </div>
                        <div class="col-4 col-sm-6 col-md-8"></div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        foreach ($comments as $comment) {
        ?>
            <div class="comment-container row">
                <div class="col-12">
                    <div class="comment-header row">
                        <div class="col-10">
                            <span class="bold">
                                <?= htmlspecialchars($comment->getPseudo());?>
                            </span>
                            <br />
                            <em style="font-size: small">
                                Posté le <?=htmlspecialchars($comment->getCreatedAt());?>
                            </em>
                        </div>
                        <div class="col-2 comment-actions">
                            <div class="row">
                                <div id="flag-comment col-6">
                                    <?php
                                    if ($comment->getIsFlag()) {
                                        ?>
                                        <div class="text-danger flagged-text">
                                            <i class="fas fa-flag"></i> Signalé
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="action">
                                            <a type="button" class="btn btn-outline-danger" alt="Signaler le commentaire" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div id="delete-comment col-6">
                                    <?php
                                    if (
                                        $this->session->get('loggedIn')
                                        && $this->session->get('user')->getPseudo() == $comment->getPseudo()
                                    ) {
                                        ?>
                                        <div class="action">
                                            <a  type="button" class="btn btn-outline-danger" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>&pseudo=<?= $comment->getPseudo(); ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-content row">
                        <div class="col-12">
                            <?= htmlspecialchars($comment->getContent());?>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>
    </div>
</div>

