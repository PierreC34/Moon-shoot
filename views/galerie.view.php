<?php
ob_start();
?>

<div class="div-principale-galerie-1 bg-black">
    <h1 class="text-center h1-galerie">Galerie</h1>

    <section class="grille">
        <!-- Récuperation en base donnée les informations liée au images -->
        <?php foreach ($images as $image) : ?>
            <article class="grid-item bg-black">
                <div class="h-100 w-100 div-inferieur-grid-item">
                    <!-- Affichage de l'image grace a la recuperation des informations ce trouvant dans la variable $image -->
                    <img src="public/images/<?= $image->getImage() ?>" alt="<?= $image->getTitle() ?>" style="height:100%; width:100%">
                </div>

                <!-- Partie réserver a l'admin grace a l'ecoute de l'id de $_SESSION['user']  -->
                <?php if (isset($_SESSION["user"]) && $_SESSION['user']->getIdUser() === "1") { ?>
                    <div class="grid-galerie-modifier-supprimer">

                        <!-- Bouton modifier dirigeant directement a la page de modification -->
                        <td class="align-middle"><a href="<?= URL ?>galerie/modifier/<?= $image->getId() ?>" class="btn btn-warning h-100">Modifier</a></td>
                        <!-- Bouton supprimer il supprimera directement l'image selectionner -->
                        <td class="align-middle">
                            <form method="post" action="<?= URL ?>galerie/supprimer/<?= $image->getId() ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer l image ?');">
                                <button class="btn btn-danger w-100 h-100 " type="submit">Supprimer</button>
                            </form>
                        </td>
                    </div>
                <?php } ?>
            </article>
        <?php endforeach; ?>
    </section>

    <?php if (isset($_SESSION["user"]) && $_SESSION['user']->getIdUser() === "1") { ?>
        <!-- Bouton ajouter permet d'ajouter du contenu -->
        <div class="button-add mt-5">
            <a href="<?= URL ?>galerie/ajouter" class="w-25 m-auto btn btn-light d-block addImage">Ajouter</a>
        </div>
    <?php } ?>
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

$title = "galerie";
$content = ob_get_clean();
require_once "template.view.php";
