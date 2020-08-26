<form method="post" action="index.php?route=addComment&articleId=<?= filter_var($article->getId(), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
    <div class="form-group">
        <textarea class="form-control" id="comment-form-content" name="content" required aria-required="true"></textarea>
    </div>
    <span class="alert-danger">
        <?= isset($errors['content']) ? filter_var($errors['content'], FILTER_SANITIZE_STRING) : ''; ?>
    </span>
    <div class="text-right">
        <input class="btn btn-primary align-right" type="submit" value="Commenter" id="submit" name="submit">
    </div>
</form>