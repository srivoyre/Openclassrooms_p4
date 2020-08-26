<?php
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Créer' : 'Enregistrer';
?>
<form method="post" action="index.php?route=<?= filter_var($route, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
    <div class="form-group">
        <label for="title">Titre du chapitre</label>
        <br />
        <input class="form-control" type="text" id="title" name="title" value="<?= isset($post) ? filter_var($post->get('title'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : ''; ?>">
        <span class="alert-danger">
            <?= isset($errors['title']) ? filter_var($errors['title'], FILTER_SANITIZE_STRING) : ''; ?>
        </span>
    </div>
    <div class="form-group">
        <label for="order_num">Numéro du chapitre</label>
        <br />
        <input class="form-control" type="number" id="order_num" name="order_num" value="<?= isset($post) ? filter_var($post->get('order_num'), FILTER_SANITIZE_NUMBER_INT) : ''; ?>">
        <span class="alert-danger">
            <?= isset($errors['order_num']) ? filter_var($errors['order_num'], FILTER_SANITIZE_STRING) : ''; ?>
        </span>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <br />
        <textarea id="content" class="form-control" name="content">
            <?= isset($post) ? filter_var($post->get('content'), FILTER_SANITIZE_SPECIAL_CHARS) : ''; ?>
        </textarea>
        <span class="alert-danger">
            <?= isset($errors['content']) ? filter_var($errors['content'], FILTER_SANITIZE_STRING) : ''; ?>
        </span>
        <script>
            tinymce.init({
                selector: 'textarea',
                /*width: 1200,*/
                height: 600,
                autosave_interval: "20s",
                save_enablewhendirty: true,
                menu: {
                    edit: { title: 'Édition', items: 'undo redo | cut copy paste | selectall | searchreplace' },
                    view: { title: 'Affichage', items: 'visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
                    insert: { title: 'Insertion', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                    tools: { title: 'Outils', items: 'a11ycheck spellchecker spellcheckerlanguage' },
                    help: { title: 'Aide', items: 'help' }
                },
                menubar: 'edit view insert tools help',
                plugins: [
                    'a11ychecker advlist autolink casechange link linkchecker image lists charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking tinymcespellchecker',
                    'table emoticons template paste help',
                    'autosave'
                ],
                toolbar1: ' undo redo | styleselect | alignment | bold italic underline | fontselect fontsizeselect | casechange | forecolor backcolor emoticons | removeformat ',
                toolbar2: 'bullist numlist outdent indent | link image table advtable | preview | restoredraft ',
                toolbar_mode: 'floating',
                setup: function (editor) {

                    /* adding an alignment group toolbar button */
                    editor.ui.registry.addGroupToolbarButton('alignment', {
                        icon: 'align-left',
                        tooltip: 'Alignment',
                        items: 'alignleft aligncenter alignright | alignjustify'
                    });

                },
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
    </div>

    <input class="btn btn-primary" type="submit" value="<?= filter_var($submit, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" id="submit" name="submit">
    <?php
    if ($route !== 'addArticle') {
        ?>
        <input class="btn btn-primary" type="submit" value="Enregistrer et quitter" id="submitAndLeave" name="submitAndLeave">
        <?php
    }
    ?>
</form>

