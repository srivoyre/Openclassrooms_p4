<?php $this->title = 'Modifier l\'article'; ?>
<?php $this->script =  'src="https://cdn.tiny.cloud/1/8tzv2jc2jx5cy4ulyl2dvykrlorgyrfsyawguzw4kzmtly5t/tinymce/5/tinymce.min.js" referrerpolicy="origin"'; ?>

<?= $this->session->show('edit_article'); ?>

<a href="../public/index.php"><< Retour à l'accueil</a>
<a href="../public/index.php?route=administration"><< Retour à l'administration</a>

<div>
    <?php include('form_article.php'); ?>
</div>


