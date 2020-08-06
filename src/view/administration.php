<?php $this->title = 'Administration'; ?>
<div class="row container">
    <div class="col-12">

        <div class="row">
            <div class="col-6">
                <h2>Articles</h2>
            </div>
            <div class="col-6 text-right">
                <a type="button" class="btn btn-outline-secondary" href="../public/index.php?route=addArticle">
                    Nouveau chapitre
                </a>
            </div>

            <table class="table table-hover table-responsive col-12">
                <thead>
                    <th class="text-center" scope="col">
                        <span>N°<span class="d-none d-lg-block"> du chapitre</span></span>
                        <!--<span class="d-block d-sm-none d-none d-sm-block d-md-none d-none d-md-block d-lg-none">N°</span>-->
                    </th>
                    <th class="text-center" scope="col">Statut</th>
                    <th class="d-none text-center" scope="col">Titre</th>
                    <th scope="col">Détail</th>
                    <!--<th class="d-none text-center" scope="col">Auteur</th>
                    <th class="d-none text-center" scope="col">Date de création</th>
                    <th class="d-none text-center" scope="col">Dernière publication</th>
                    <th class="d-none text-center" scope="col">Actions</th>-->
                </thead>
                <?php
                foreach ($articles as $article)
                {
                    ?>
                    <tr>
                        <th scope="row">
                            <?= htmlspecialchars($article->getOrderNum()); ?>
                        </th>
                        <td>
                            <?php
                            if($article->getIsPublished() == 0)
                            {
                                ?>
                                Brouillon
                                <?php
                            }
                            elseif ($article->getIsPublished() == 1)
                            {
                                ?>
                                Publié
                                <?php
                            }
                            ?>
                        </td>
                        <td class="d-flex flex-column">
                            <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>">
                                <?= htmlspecialchars($article->getTitle()); ?>
                            </a>
                        </td>
                        <td class="d-flex flex-column">
                            <span class="d-none d-md-block">
                                <?= substr(strip_tags($article->getContent()), 0, 150); ?>
                            </span>
                            <span class="font-italic d-block d-sm-none">
                                Aperçu du chapitre indisponible
                            </span>
                        </td>
                        <td class="d-flex flex-column">
                            Écrit par <?= htmlspecialchars($article->getAuthor()); ?>
                        </td>
                        <td class="d-flex flex-column">
                            Date de création : <?= htmlspecialchars($article->getCreatedAt()); ?>
                        </td>
                        <td class="d-flex flex-column">
                            <?php
                            // Avoid default '01/01/1970' display if date is null
                            if (!is_null($article->getLastPublishedDate())) {
                            ?>
                                Dernière publication le <?= htmlspecialchars(date('d/m/Y', strtotime($article->getLastPublishedDate()))); ?>
                            <?php
                            }
                            ?>

                        </td>
                        <td class="d-flex flex-wrap">
                            <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <?php
                            if($article->getIsPublished() == 0)
                            {
                                ?>
                                <a type="button" class="btn btn-outline-success mb-1 mx-1" href="../public/index.php?route=publishArticle&articleId=<?= $article->getId(); ?>">
                                    Publier
                                </a>
                                <?php
                            }
                            elseif ($article->getIsPublished() == 1)
                            {
                                ?>
                                <a type="button" class="btn btn-outline-warning mb-1 mx-1" href="../public/index.php?route=unpublishArticle&articleId=<?= $article->getId(); ?>">
                                    Dépublier
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="row">

            <h2>Commentaires signalés</h2>

            <div class="row">
                <table class="table table-hover table-responsive col-12">
                    <thead>
                    <th class="text-center" scope="col">Pseudo</th>
                    <th scope="col">Détails</th>
                    <!--<th scope="col">Message</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>-->
                    </thead>
                    <?php
                    foreach($comments as $comment)
                    {
                        ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($comment->getPseudo()); ?>
                            </td>
                            <td class="d-flex flex-column text-break">
                                <?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?>
                            </td>
                            <td class="d-flex flex-column">
                                Commentaire posté le : <?= htmlspecialchars($comment->getCreatedAt()); ?>
                            </td>
                            <td class="d-flex flex-wrap">
                                <a type="button" class="btn btn-outline-primary mb-1 mx-1" href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">
                                    Désignaler
                                </a>
                                <a type="button" class="btn btn-outline-danger mb-1 mx-1" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="row">
            <h2>Utilisateurs</h2>
            <div class="row">
                <table class="table table-hover table-responsive col-12">
                    <thead>
                        <th class="text-center" scope="col">Pseudo</th>
                        <th scope="col">Détails</th>
                        <!--<th scope="col">Email</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Actions</th>-->
                    </thead>
                    <?php
                    foreach($users as $user)
                    {
                        ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($user->getPseudo()); ?>
                            </td>
                            <td class="d-flex flex-column">
                                <a href="mailto:<?= htmlspecialchars($user->getEmail()); ?>">
                                    <?= htmlspecialchars($user->getEmail()); ?>
                                </a>
                            </td>
                            <td class="d-flex flex-column">
                                <?= htmlspecialchars($user->getCreatedAt()); ?>
                            </td>
                            <td class="d-flex flex-column">
                                <?= htmlspecialchars($user->getRole()); ?>
                            </td>
                            <td class="d-flex flex-wrap">
                                <?php
                                if(!$user->getIsAdmin())
                                {
                                    ?>
                                    <a type="button" class="btn btn-outline-danger" href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    Suppression impossible
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>

</div>