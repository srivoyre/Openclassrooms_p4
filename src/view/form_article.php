<?php
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Créer' : 'Enregistrer';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre du chapitre</label>
    <br />
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')) : ''; ?>">
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <br />
    <label for="order_num">Numéro du chapitre</label>
    <br />
    <input type="number" id="order_num" name="order_num" value="<?= isset($post) ? $post->get('order_num') : ''; ?>">
    <br />
    <?= isset($errors['order_num']) ? $errors['order_num'] : ''; ?>
    <label for="content">Contenu</label>
    <br />
    <textarea id="content" name="content">
        <?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?>
    </textarea>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <script>
        tinymce.init({
            selector: 'textarea',
            width: 1200,
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
            toolbar1: ' undo redo | styleselect | bold italic underline | alignment | fontselect fontsizeselect | casechange | forecolor backcolor emoticons | removeformat ',
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
    <br />

    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
    <?php
        if ($route !== 'addArticle') {
    ?>
            <input type="submit" value="Enregistrer et quitter" id="submit" name="submitAndLeave">
    <?php
        }
    ?>
</form>