<?php ob_start();
?>
<div class="row">
    <div class="col-12 col-lg-6 col-md-12 col-sm-12">
        <img src="<?= URL ?>public/images/<?= $book->getImage() ?>" alt="<?= $book->getTitle() ?>" class="bigImg">
    </div>
    <div class="col-6">
        <p>Titre : <?= $book->getTitle() ?></p>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once "views/template.view.php";
