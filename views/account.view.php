<?php
ob_start();

?>


<div class="pt-5 div-connexion-compte text-center">
    <div class="p-5 grid-gauche-compte m-auto">
        <h1>Compte</h1>
        <section>
            <form method="POST" action="<?php URL ?>compte/connexion" enctype="multipart/form-data">
                <div class="form-group mt-1">
                    <label for="login_user">Login : </label>
                    <input type="text" class="form-control w-25 m-auto pseudo-compte" id="login_user" name="login_user" required>
                </div>
                <div class="form-group mt-1">
                    <label for="mdp_user">Mot de passe : </label>
                    <input type="password" class="form-control w-25 m-auto mdp-compte" id="mdp_user" name="mdp_user" required>
                </div>
                <button type="submit" class="btn btn-primary b-bloc m-auto mt-3 valider-compte">Valider</button>
            </form>
        </section>

        <section>
            <p class="p-compte">Pas encore inscrit ?</p>
            <a href="<?= URL ?>compte/ajouter" class="m-auto btn btn-light d-block addUser">Inscription</a>
        </section>
        <?php
        if (!empty($_SESSION['alert'])) :
        ?>
            <div class="message-galerie message-connexion mt-1 text-center w-50">
                <div class="text-center alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
                    <?= $_SESSION['alert']['msg'] ?>
                </div>
            </div>
        <?php
        endif
        ?>
    </div>
    <div class="grid-droit-compte">

    </div>



</div>
<?php
$title = "Compte";
$content = ob_get_clean();
require_once "template.view.php";
