<?php $this->title = htmlspecialchars($article->getTitle()); ?>

<div class="row my-2">
    <div class="col-6 mx-0 px-0">
        <a class="btn btn-light" href="../public/index.php">
            << Retour à la liste des chapitres
        </a>
    </div>
    <div class="col-6 text-right">
        <?php
        if (
            $this->session->get('loggedIn')
            && $this->session->get('user')->getIsAdmin()
        ) {
            ?>
            <a  type="button" class="btn btn-outline-primary" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                <i class="fas fa-edit"></i>
            </a>
            <?php
        }
        ?>
    </div>
</div>

<div class="row mx-0">
    <div class="col-12 my-3">
        <h1>
            <?= htmlspecialchars($article->getTitle()); ?>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?= $article->getContent();?>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <span class="font-weight-bold font-italic">
            <?php
            // Avoid default '01/01/1970' display if date is null
            if (!is_null($article->getLastPublishedDate())) {
                ?>
                publié le <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate()))); ?>
                <?php
            }
            ?>
        </span>
    </div>
</div>

<div id="chapters-nav" class="row mb-4">
    <div id="previous-chapter" class="col-6">
        <?php
        if (empty($article->getPreviousArticle()) == false) {
            ?>
            <a class="btn btn-info" href="../public/index.php?route=viewArticle&articleId=<?= $article->getPreviousArticle()->getId(); ?>">
                << Précédent
            </a>
            <?php
        }
        ?>
    </div>
    <div id="next-chapter" class="col-6 text-right">
        <?php
        if (empty($article->getNextArticle()) == false) {
            ?>
            <a class="btn btn-info" href="../public/index.php?route=viewArticle&articleId=<?= $article->getNextArticle()->getId(); ?>">
                Suivant >>
            </a>

            <?php
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-1 col-lg-2"></div>
    <div id="comments-container" class="border col-md-10 col-lg-8 py-3 px-md-2 p-lg-5">
        <div class="row">
            <div class="col-12">
                <h3>Commentaires</h3>
                <?php
                if ($this->session->get('loggedIn')) {
                    ?>
                    <h4 class="mt-3">Ajouter un commentaire :</h4>
                    <div class="row my-4">
                        <div class="col-12">
                            <?php include('form_comment.php'); ?>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row my-3">
                        <div class="col-12">Vous devez être connecté pour commenter !</div>
                    </div>
                    <div class="row mb-3">
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
        if (empty($comments)) {
            ?>
            <div class="font-italic text-center">Soyez le premier à commenter !</div>
            <?php
        }
        foreach ($comments as $comment) {
            ?>
            <div class="row">
                <div class="col-12 mx-0">
                    <div class="comment-header row">
                        <div class="col-7">
                    <span class="font-weight-bold">
                        <?= htmlspecialchars($comment->getPseudo());?>
                    </span>
                            <br />
                            <span class="font-italic small">
                        Posté le <?=htmlspecialchars($comment->getCreatedAt());?>
                    </span>
                        </div>
                        <div class="col-5 d-flex flex-wrap justify-content-end">
                            <div id="delete-comment">
                                <?php
                                if (
                                    $this->session->get('loggedIn')
                                    && $this->session->get('user')->getPseudo() == $comment->getPseudo()
                                ) {
                                    ?>
                                    <div class="mx-1">
                                        <a  type="button" class="btn btn-outline-danger" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>&pseudo=<?= $comment->getPseudo(); ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div id="flag-comment">
                                <?php
                                if ($comment->getIsFlag()) {
                                    ?>
                                    <div class="text-danger flagged-text">
                                        <i class="fas fa-flag"></i> Signalé
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="mx-1">
                                        <a type="button" class="btn btn-outline-danger" alt="Signaler le commentaire" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 border-bottom ml-3 mb-3 pb-3 text-break">
                            <?= htmlspecialchars($comment->getContent());?>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>
    </div>
    <div class="col-md-1 col-lg-2"></div>
</div>

