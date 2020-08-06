<?php $this->title = $article->getTitle(); ?>

<p>
    <a type="button" class="btn btn-secondary" href="../public/index.php"><< Retour à l'accueil</a>
</p>

<div>
    <h2>
        <?= htmlspecialchars($article->getTitle());?>
    </h2>
    <?php
    if (
        $this->session->get('loggedIn')
        && $this->session->get('user')->getIsAdmin()
    ) {
        ?>
        <div>
            <a  type="button" class="btn btn-primary" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                Modifier
            </a>
        </div>
        <?php
    }
    ?>
    <p>
        <?= $article->getContent();?>
    </p>

    <p>
        Publié le <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate())));?>
    </p>
</div>
<div>
    <?php
    if (empty($article->getPreviousArticle())== false) {
        ?>
        <a href="../public/index.php?route=viewArticle&articleId=<?= $article->getPreviousArticle()->getId(); ?>">
            <
        </a>
        Chapitre <?= $article->getPreviousArticle()->getOrderNum(); ?>
        <?php
    }

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

<div id="comments-container" class="border-bottom-0">
    <h3>Commentaires</h3>

    <div id="comment-form-container">
        <?php
            if ($this->session->get('loggedIn')) {
        ?>
            <h4>Ajouter un commentaire</h4>
            <?php include('form_comment.php'); ?>
        <?php
        } else {
        ?>
            <p>Vous devez être connecté pour commenter !</p>
            <div>
                <a type="button" class="btn btn-primary" href="../public/index.php?route=login">
                    Connexion
                </a>
                <a type="button" class="btn btn-primary" href="../public/index.php?route=register">
                    Inscription
                </a>
            </div>

        <?php
        }
        ?>
    </div>



<?php
foreach ($comments as $comment) {
?>
    <div class="comment-container">

        <div class="comment-header">

            <div>
                <span class="bold">
                    <?= htmlspecialchars($comment->getPseudo());?>
                </span>
                <br />
                <em style="font-size: small">
                    Posté le <?=htmlspecialchars($comment->getCreatedAt());?>
                </em>
            </div>

            <div class="comment-actions">
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
                        <a  type="button" class="btn btn-outline-danger" alt="Signaler le commentaire" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>">
                            <i class="fas fa-exclamation-circle"></i>
                        </a>
                    </div>
                    <?php
                }
                ?>

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

        <div class="comment-content">
            <?= htmlspecialchars($comment->getContent());?>
        </div>

    </div>
<?php
}
?>
</div>