<?php
ob_start();
?>

<div class="">
    <div class="pt-5 text-center div-principale-ajout-compte">
        <div class="w-50 m-auto div-secondaire-ajout-compte grid-gauche-ajout-compte">
            <h1 class="text-center crea1">Création de compte</h1>
            <form method="POST" action="<?= URL ?>compte/validate" enctype="multipart/form-data">
                <div class="form-ajout-compte">
                    <div class="form-group mt-1 crea1">
                        <label for="name_user">Nom : </label>
                        <input type="text" class="form-control" id="name_user" name="name_user" required>
                    </div>
                    <div class="form-group mt-1 crea1">
                        <label for="first_name_user">Prénom : </label>
                        <input type="text" class="form-control" id="first_name_user" name="first_name_user">
                    </div>
                    <div class="form-group mt-1 crea1">
                        <label for="login_user">Login : </label>
                        <input type="text" class="form-control" id="login_user" name="login_user" required>
                    </div>
                    <div class="form-group crea1">
                        <label for="mdp_user">Mot de passe : </label>
                        <input type="password" class="form-control" id="mdp_user" name="mdp_user" required>
                    </div>
                    <div class="form-outline crea1">
                        <label class="form-label" for="password2">Confirmez votre password</label>
                        <input type="password" id="password2" class="form-control" name="password2" required />
                        <?php
                        if (!empty($error) && $error == "notSamePass") {
                        ?> <small class="text-danger">Vous avez rentré deux mots de passes différents</small>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-group crea1">
                        <label for="email">Email : </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group crea1">
                        <label for="name_role">Nom du rôle : </label>
                        <input type="text" class="form-control" id="name_role" name="name_role">
                    </div>
                    <div class="crea1">
                        <button type="submit" class=" mt-3 mb-5 btn btn-primary b-bloc m-auto">Valider</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="grid-droit-ajout-compte">

        </div>
    </div>
</div>
<?php
$title = "Ajouter un compte ";
$content = ob_get_clean();
require_once "template.view.php";
