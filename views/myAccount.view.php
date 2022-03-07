<?php ob_start();
?>
<div class="div-principale-moncompte pt-5 bg-black">
    <h1 class="pt-5 text-center">MON COMPTE</h1>
    <div class="div-secondaire-moncompte m-auto">
        <section class="grille-moncompte w-100 text-center">
            <article class="mt-2">
                <p>Login :</p>
                <p class="infos-login-user"><?= $_SESSION['user']->getLoginUser() ?></p>
            </article>
            <article class="mt-2">
                <p>Nom : </p>
                <p class="infos-name-user"><?= $_SESSION['user']->getNameUser() ?></p>
            </article>
            <article class="mt-2">
                <p>Prénom : </p>
                <p class="infos-first-name-user"><?= $_SESSION['user']->getFirstNameUser() ?></p>
            </article>
            <article class="mt-2">
                <p>Email : </p>
                <p class="infos-email-user"><?= $_SESSION['user']->getEmail() ?></p>
            </article>
            <article class="mt-2">
                <p>Rôle : </p>
                <p class="infos-name-role-user"><?= $_SESSION['user']->getName_role() ?></p>
            </article>
        </section>
        <div class="div-modifier-supprimer pb-5">
            <td class="align-middle "><a href="<?= URL ?>compte/moncompte/modifier/<?= $user->getIdUser() ?>" class="btn btn-warning btn-modifier">Modifier</a></td>
            <td class="align-middle">
                <form method="post" class="m-auto" action="<?= URL ?>compte/moncompte/supprimer/<?= $user->getIdUser() ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer le compte  ?');">
                    <button class="btn btn-danger btn-supprimer" type="submit">Supprimer</button>
                </form>
            </td>
        </div>
    </div>
    <?php if (!empty($_SESSION['alert'])) : ?>
        <div class="message-galerie">
            <div class="text-center text-center mt-2 alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
                <?= $_SESSION['alert']['msg'] ?>
            </div>
        </div>

    <?php
    endif

    ?>
</div>

<?php
$content = ob_get_clean();
$title = "Mon compte";
require_once "views/template.view.php";
