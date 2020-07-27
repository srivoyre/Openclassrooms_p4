<?php

require 'Database.php';
require 'Post.php';
require 'Comment.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mon blog</title>
    </head>

    <body>
        <div>
            <h1>Mon blog</h1>
            <p>En construction</p>

            <?php
            $post = new Post();
            $posts = $post->getPost($_GET['postId']);
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
            <a href="home.php">retour à l'accueil</a>
            <div id="comments" class="text-left" style="margin-left: 50px;">
                <h3>Commentaires</h3>
                <?php
               $comment = new Comment();
               $comments = $comment->getCommentsFromPost($_GET['postId']);
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
