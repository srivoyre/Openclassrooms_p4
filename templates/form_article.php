<?php
//$route = isset($article) && $article->getId() ? 'editArticle&articleId='.$article->getId() : 'addArticle';
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
//$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
//$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';
//$author = isset($article) && $article->getAuthor() ? htmlspecialchars($article->getAuthor()) : '';
?>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label>
    <br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')) : ''; ?>">
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <br>
    <label for="content">Contenu</label>
    <br>
    <textarea id="content" name="content">
        <?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?>
    </textarea>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <br>
    <label for="author">Auteur</label>
    <br>
    <input type="text" id="author" name="author" value="<?= isset($post) ? htmlspecialchars($post->get('author')) : ''; ?>">
    <?= isset($errors['author']) ? $errors['author'] : ''; ?>
    <br>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>