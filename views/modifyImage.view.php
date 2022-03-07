<?php
ob_start();
?>

<div class="pt-5 div-modify-image fixed bg-black">
    <div class="w-50 m-auto div-secondaire-modify-image">
        <form method="POST" action="<?= URL ?>galerie/modifierValidate" enctype="multipart/form-data">
            <div class="form-group mt-1 text-center">
                <h2 for="title">TITRE</h2>
                <input type="text" class="form-control" id="title" name="title" value="<?= $image->getTitle() ?>">
            </div>
            <h3 class="mt-3 text-center">IMAGE </h3>
            <div class="w-50 div-image m-auto">
                <img src="<?= URL ?>public/images/<?= $image->getImage() ?>" class="w-75">
            </div>
            <div class="form-group mt-2 fichier-modify">
                <label class="m-auto" for="image">Changer l'image : </label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <input type="hidden" name="id" value="<?= $image->getId() ?>">
            <button type="submit" class="btn btn-primary d-block m-auto mt-2">Valider</button>
        </form>
    </div>
</div>
<?php
$title = "Modification de l'image : " . $image->getTitle();
$content = ob_get_clean();
require_once "template.view.php";
