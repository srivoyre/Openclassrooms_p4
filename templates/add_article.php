<?php $this->title = 'Nouvel article'; ?>
<?php $this->script =  'src="https://cdn.tiny.cloud/1/8tzv2jc2jx5cy4ulyl2dvykrlorgyrfsyawguzw4kzmtly5t/tinymce/5/tinymce.min.js" referrerpolicy="origin"'; ?>

<h1>Mon blog</h1>
<p>En construction</p>

<?= $this->session->show('add_article'); ?>

<a href="../public/index.php">Retour à l'accueil</a>
<a href="../public/index.php?route=administration">Retour à l'administration</a>

<div>
    <?php include('form_article.php'); ?>
</div>
