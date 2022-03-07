<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette">
</head>

<body>
    <header class="bg-custom-1 ">

        <nav class="navbar navbar-expand-lg m-auto ">
            <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars" style="color:#fff; font-size:30px;"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <a class="nav-a nav-link active m-auto" href="<?= URL ?>presentation">Présentation</a>
                <a class="nav-a nav-link active m-auto" href="<?= URL ?>galerie">Galerie</a>
                <p class="nav-p m-auto h1 text-center">Moon Tattoo</p>
                <a class="nav-a nav-link active m-auto" href="<?= URL ?>service">Service</a>
                <a class="nav-a nav-link active m-auto" href="<?= URL ?>contact">Contact</a>
            </div>
        </nav>

    </header>


    <div class="text-center">
        <?php if (!empty($_SESSION["user"])) { ?>
            <div class="div-account-deconnection">
                <a href="<?= URL ?>compte/moncompte" class="text-center m-auto"><?= $_SESSION['user']->getLoginUser() ?></p>
                    <a href="<?= URL ?>compte/deconnection">
                        <i class="fas fa-power-off account"></i>
                    </a>
            </div>
        <?php
        } else {
        ?>
            <div class="div-account">
                <a href="<?= URL ?>compte">
                    <i class="fas fa-user-circle account"></i>
                </a>
            </div>
        <?php
        }
        ?>
        <?= $content ?>
    </div>

    <footer class="text-center">
        <div class="">
            <a class="a-footer accueil-footer p-2" href="<?= URL ?>presentation">Présentation</a> |
            <a class="a-footer photo-footer p-2" href="<?= URL ?>galerie">Galerie</a> |
            <a class="a-footer service-footer p-2" href="<?= URL ?>service">Service</a> |
            <a class="a-footer contact-footer p-2" href="<?= URL ?>contact">Contact</a>
        </div>
        <div class="text-center p-1 div-copyright">
            <p>Copyright © 2021. Tous droits réservés Pcomputer</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>



</body>

</html>