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
        Auteur : <?= htmlspecialchars($article->getAuthor());?>
    </p>
    <p>
        Publié le : <?= htmlspecialchars($article->getLastPublishedDate());?>
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

<div id="comments-container">
    <h3>Commentaires</h3>
<?php
if ($this->session->get('loggedIn')) {
?>
    <h4>Ajouter un commentaire</h4>
    <?php include('form_comment.php'); ?>
<?php
} else {
?>
    <p>Vous devez être connecté pour poste un commentaire</p>
    <a href="../public/index.php?route=login">Je me connecte !</a>
    <a href="../public/index.php?route=register">Je crée un compte !</a>
<?php
}
?>


<?php
foreach ($comments as $comment) {
?>
    <div class="comment-container">

        <div class="comment-header">

            <div>
                <span class="bold">
                    <?= htmlspecialchars($comment->getPseudo());?>
                </span>
                    <span class="italic">
                    le <?=htmlspecialchars($comment->getCreatedAt());?>
                </span>
            </div>

            <div class="flag-container">
                <?php
                if ($comment->getIsFlag()) {
                    ?>
                    <span class="text-danger flagged-text">
                            Signalé
                        </span>
                    <?php
                } else {
                    ?>
                    <div>
                        <a  type="button" class="btn btn-outline-danger" alt="Signaler le commentaire" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-flag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.5 1a.5.5 0 0 1 .5.5v13a.5.5 0 0 1-1 0v-13a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M3.762 2.558C4.735 1.909 5.348 1.5 6.5 1.5c.653 0 1.139.325 1.495.562l.032.022c.391.26.646.416.973.416.168 0 .356-.042.587-.126a8.89 8.89 0 0 0 .593-.25c.058-.027.117-.053.18-.08.57-.255 1.278-.544 2.14-.544a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5c-.638 0-1.18.21-1.734.457l-.159.07c-.22.1-.453.205-.678.287A2.719 2.719 0 0 1 9 9.5c-.653 0-1.139-.325-1.495-.562l-.032-.022c-.391-.26-.646-.416-.973-.416-.833 0-1.218.246-2.223.916A.5.5 0 0 1 3.5 9V3a.5.5 0 0 1 .223-.416l.04-.026z"/>
                            </svg>
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

        <?php
        if (
            $this->session->get('loggedIn')
            && $this->session->get('user')->getPseudo() == $comment->getPseudo()
        ) {
            ?>
            <p>
                <a  type="button" class="btn btn-outline-primary" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>&pseudo=<?= $comment->getPseudo(); ?>">
                    Supprimer mon commentaire
                </a>
            </p>
            <?php
        }
        ?>

    </div>
<?php
}
?>
</div>