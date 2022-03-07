<?php
ob_start();
?>



<div class="div-principale-contact-1">
    <section class="section-contact-un m-auto">
        <!-- grid superieur -->
        <article class="article-contact-un">
            <form action="<?= URL ?>contact" method="POST">
                <div class="form-gradient formulaire-contact">
                    <section class="card">
                        <h1 class="h1-contact-un mt-3 pt-5">FORMULAIRE DE CONTACT</h1>
                        <article class="card-body">
                            <div class="md-form">
                                <!-- Input Mail ce qui permet de communiquer l'addresse mail de l'expediteur -->
                                <label class="label-form" for="form105">Votre mail</label>
                                <input type="text" id="form105" name="email" class="form-control" required>

                            </div>
                            <div class="md-form">
                                <!-- Input Sujet ce qui permet de renseigner le sujet du formulaire de l'expediteur -->
                                <label class="label-form" for="form106">Sujet</label>
                                <input type="text" id="form106" name="sujet" class="form-control" required>

                            </div>
                            <div class="md-form">
                                <!-- Input Message ce qui permet taper le message de l'expediteur -->
                                <label class="label-form" for="form107">Votre message</label>
                                <textarea id="form107" name="message" class="md-textarea form-control" rows="5" required></textarea>

                            </div>
                            <div class="row d-flex align-items-center mb-3 mt-4">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button class="btn btn-primary " type="submit" name="envoyer">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>

                    <?php
                    if (!empty($_SESSION['alert'])) :
                    ?>
                        <div class="w-25 m-auto alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
                            <?= $_SESSION['alert']['msg'] ?>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['alert']);
                    ?>
                </div>
            </form>
        </article>
        <!-- grid inferieur -->
        <section class="section-contact-deux text-center">
            <article class="article-adresse mt-3">
                <i class="fas fa-map-marker-alt"></i>
                <p class="p-contact">Adresse</p>
                <p>rue</p>
                <p>code postal</p>
            </article>
            <article class="article-telephone mt-4">
                <i class="fas fa-phone-alt"></i>
                <p class="p-contact">Téléphone</p>
                <p>+33 (0) numéro de telephone</p>
            </article>
            <article class="article-mail mt-4">
                <i class="fas fa-envelope"></i>
                <p class="p-contact">Adresse mail</p>
                <a class="mailto-contact" href="mailto:adresse mail">adresse mail</a>
            </article>
        </section>
    </section>
    <article class="article-iframe">
        <iframe src="liens de la map google" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </article>
</div>
<?php
$title = "Contact";
$content = ob_get_clean();
require_once "template.view.php";
