<?php
ob_start();
?>

<div class="pt-5 div-modify-image">
    <div class="w-50 m-auto">
        <form method="POST" action="<?= URL ?>compte/moncompte/modifierValidate" enctype="multipart/form-data">
            <div class="form-group mt-1 text-center">
                <p for="name_user">Nom :</p>
                <input type="text" class="form-control" id="name_user" name="name_user" value="<?= $user->getNameUser() ?>">
            </div>

            <div class="form-group mt-1 text-center">
                <p for="first_name_user">Prénom :</p>
                <input type="text" class="form-control" id="first_name_user" name="first_name_user" value="<?= $user->getFirstNameUser() ?>">
            </div>

            <div class="form-group mt-1 text-center">
                <p for="login_user">Login :</p>
                <input type="text" class="form-control" id="login_user" name="login_user" value="<?= $user->getLoginUser() ?>">
            </div>

            <div class="form-group mt-1 text-center">
                <p for="email">Email :</p>
                <input type="text" class="form-control" id="email" name="email" value="<?= $user->getEmail() ?>">
            </div>

            <div class="form-group mt-1 text-center">
                <p for="mdp_user">Mot de passe :</p>
                <input type="text" class="form-control" id="mdp_user" name="mdp_user" value="<?= $user->getLoginUser() ?>">
            </div>

            <input type="hidden" name="id" value="<?= $user->getIdUser() ?>">
            <button type="submit" class="btn btn-primary w-25 d-block m-auto mt-5">Valider</button>
        </form>
    </div>
</div>
<?php
$title = "Modification du compte numero° : ".$user->getIdUser();
$content = ob_get_clean();
require_once "template.view.php";
