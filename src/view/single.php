<?php $this->title = $article->getTitle(); ?>

<p>
    <a type="button" class="btn btn-secondary" href="../public/index.php"><< Retour à l'accueil</a>
</p>

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
        <div class="actions">
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

<br />

<div id="comments" class="text-left" style="margin-left: 50px;">
<?php
if ($this->session->get('loggedIn')) {
?>
    <h3>Ajouter un commentaire</h3>
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

<h3>Commentaires</h3>

<?php
foreach ($comments as $comment) {
?>
    <h4>
        <?= htmlspecialchars($comment->getPseudo());?>
    </h4>
    <p>
        <?= htmlspecialchars($comment->getContent());?>
    </p>
    <p>
        Posté le <?=htmlspecialchars($comment->getCreatedAt());?>
    </p>
<?php
    if ($comment->getIsFlag()) {
?>
        <p>
            Ce commentaire a été signalé
        </p>
<?php
    } else {
?>
        <p>
            <a  type="button" class="btn btn-outline-danger" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $comment->getArticleId(); ?>">
                Signaler le commentaire
            </a>
        </p>
<?php
    }

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
}
?>
</div>