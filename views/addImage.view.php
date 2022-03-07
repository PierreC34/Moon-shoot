<?php
ob_start();
?>

<div class="pt-5 div-ajout-image text-center bg-black">
    <div class="div-ajout-image-2">
        <form method="POST" action="<?= URL ?>galerie/validate" enctype="multipart/form-data">
            <div class="form-ajout-image">
                <div class="form-group mt-5 text-center">
                    <label for="title">Titre : </label>
                    <input type="text" class="form-control w-50 m-auto" id="title" name="title">
                </div>

                <div class="form-group mt-5">
                    <label for="image">Image : </label>
                    <input type="file" class="form-control-file d-grid" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary b-bloc m-auto mt-5 w-25">Valider</button>
            </div>
        </form>
    </div>
</div>
<?php
$title = "Ajout d'une image";
$content = ob_get_clean();
require_once "template.view.php";
