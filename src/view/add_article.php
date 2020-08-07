<?php $this->title = 'Nouvel article'; ?>
<?php $this->script =  'src="https://cdn.tiny.cloud/1/8tzv2jc2jx5cy4ulyl2dvykrlorgyrfsyawguzw4kzmtly5t/tinymce/5/tinymce.min.js" referrerpolicy="origin"'; ?>

<div class="row my-2">
    <div class="col-12 mx-0 px-0">
        <a class="btn btn-light" href="../public/index.php?route=administration">
            << Retour à l'administration
        </a>
    </div>
</div>
<div class="row container">
    <div class="col-12"
    <?php include('form_article.php'); ?>
</div>
