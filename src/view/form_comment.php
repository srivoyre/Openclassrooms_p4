<form method="post" action="index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <div class="form-group">
        <textarea class="form-control" id="comment-form-content" name="content" required aria-required="true"></textarea>
    </div>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <div class="text-right">
        <input class="btn btn-primary align-right" type="submit" value="Commenter" id="submit" name="submit">
    </div>
</form>