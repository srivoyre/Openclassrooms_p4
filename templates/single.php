<?php $this->title = "Post"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <h2>
        <?= htmlspecialchars($post->getTitle());?>
    </h2>
    <p>
        <?= htmlspecialchars($post->getContent());?>
    </p>
    <p>
        <?= htmlspecialchars($post->getAuthor());?>
    </p>
    <p>
        Crée le : <?= htmlspecialchars($post->getCreatedAt());?>
    </p>
</div>

<br />

<a href="../public/index.php">retour à l'accueil</a>

<div id="comments" class="text-left" style="margin-left: 50px;">
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
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
   }
   ?>
</div>