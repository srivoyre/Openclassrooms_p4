<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">

    <label for="content">Message*</label>
    <br />
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea>
    <br />
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="Commenter" id="submit" name="submit">
</form>