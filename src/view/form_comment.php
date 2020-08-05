<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <div class="form-group">
        <label for="content">Message*</label>
        <br />
        <textarea class="form-control" id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea>
    </div>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input class="btn btn-primary" type="submit" value="Commenter" id="submit" name="submit">
</form>