<?php $this->title = 'Modifier l\'article'; ?>
<?php $this->script =  'src="https://cdn.tiny.cloud/1/8tzv2jc2jx5cy4ulyl2dvykrlorgyrfsyawguzw4kzmtly5t/tinymce/5/tinymce.min.js" referrerpolicy="origin"'; ?>

<div class="row my-2">
    <div class="col-12 mx-0 px-0">
        <a class="btn btn-light" href="../public/index.php?route=administration">
            << Retour à l'administration
        </a>
    </div>
</div>

<div class="message">
    <?php

    if ($this->session->get('info_message')) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= $this->session->show('info_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } elseif ($this->session->get('success_message')) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->show('success_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } elseif ($this->session->get('warning_message')) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->show('warning_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } elseif ($this->session->get('error_message')) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->show('error_message') ; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
</div>

<div class="row container">
    <div class="col-12">
        <?php include('form_article.php'); ?>
    </div>
</div>


