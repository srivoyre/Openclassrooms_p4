<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mon blog</title>
    </head>

    <body>
        <div>
            <h1>Mon blog</h1>
            <p>En construction</p>

            <?php
            $post = $posts->fetch()
            ?>
            <div>
                <h2>
                    <?= htmlspecialchars($post->title);?>
                </h2>
                <p>
                    <?= htmlspecialchars($post->content);?>
                </p>
                <p>
                    <?= htmlspecialchars($post->author);?>
                </p>
                <p>
                    Crée le : <?= htmlspecialchars($post->createdAt);?>
                </p>
            </div>
            <br />

            <?php
            $posts->closeCursor();
            ?>
            <a href="../public/index.php">retour à l'accueil</a>
            <div id="comments" class="text-left" style="margin-left: 50px;">
                <h3>Commentaires</h3>
                <?php
               while($comment = $comments->fetch())
               {
                   ?>
                    <h4>
                        <?= htmlspecialchars($comment->pseudo);?>
                    </h4>
                    <p>
                        <?= htmlspecialchars($comment->content);?>
                    </p>
                    <p>
                        Posté le <?=htmlspecialchars($comment->createdAt);?>
                    </p>
                    <?php
               }
                $comments->closeCursor();
               ?>
            </div>
        </div>
    </body>
</html>
