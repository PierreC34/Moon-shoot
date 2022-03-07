<?php
require "models/User.class.php";

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Nous recuperons une seule fois le fichier 
require_once "controllers/UserController.controller.php";

require_once "controllers/ImageController.controller.php";

require_once "controllers/FormController.controller.php";

// Création d'une variable $userController qui permettra d'accedez a toutes les fonctionnalité de la classe UserController
$userController = new UserController;

try {
    // Nous recuperons la valeur dans $_get page pour pouvoir la comparé
    if (isset($_GET['page'])) {
        // Nous redéfinisson l'url pour pouvoir la minpuler 
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    }
    // si GET page est vide on redirige vers l'accueil
    if (empty($url[0])) {
        require "views/presentation.view.php";
    } else {
        //switch de GET page pour savoir vers quelles pages renvoyer l'utilisateur
        switch ($url[0]) {
            // Cas ou l'utilisateur clique sur Presentation dans le menu 
            case "presentation":
                require "views/presentation.view.php";
                break;

            // Cas ou l'utilisateur clique sur Galerie dans le menu 
            case "galerie":
                if (empty($url[1])) {
                    // Affichage des images
                    $imageController->displayImages();
                } else if ($url[1] === "ajouter") {
                    // Affichage du formulaire pour l'ajout d'image 
                    $imageController->addImage();
                } else if ($url[1] === "modifier") {
                    // Affichage du formulaire pour la modification d'image
                    $imageController->modifyImage($url[2]);
                } else if ($url[1] === "supprimer") {
                    // Affiche message de suppression (Confirmation obligatoire)
                    $imageController->deleteImage($url[2]);
                } else if ($url[1] === "validate") {
                    // Demarche d'ajout de l'image en base de donnée
                    $imageController->addImageValidate();
                } else if ($url[1] === "modifierValidate") {
                    // Demarche d'ajout de la modification de l'image en base de donnée 
                    $imageController->modifyImageValidate();
                }
                break;

            // Cas ou l'utilisateur clique sur moonshottattoo dans le menu 
            case "moonshoottattoo":
                if (empty($url[1])) {
                    require "views/moonshoottattoo.view.php";
                }
                break;
                // Cas ou l'utilisateur clique sur Service dans le menu 
            case "service":
                if (empty($url[1])) {
                    require "views/service.view.php";
                }
                break;
                // Cas ou l'utilisateur clique sur Contact dans le menu 
            case "contact":
                if (empty($url[1])) {
                    $formController->formCheck();
                }
                break;
                // Cas ou l'utilisateur clique sur Compte (Icon account) dans le menu 
            case "compte":
                if (empty($url[1])) {
                    require "views/account.view.php";
                } 
                else if ($url[1] === "ajouter") {
                    // Affiche le formulaire d'ajout user
                    $userController->addAccount();
                } 
                else if ($url[1] === "validate") {
                    // Ajout de user en base de donnée 
                    $userController->addAccountValidate();
                } 
                else if ($url[1] === "connexion") {
                    //  Affiche le formulaire de connexion 
                    $userController->connexion();
                } 
                else if ($url[1] === "deconnection") {
                    // Déconnecte et detruit la session en cours 
                    $userController->deconnection($_POST["login_user"]);
                } 
                // Cas ou l'utilisateur clique sur presentation dans le menu 
                else if ($url[1] === "moncompte") {
                    if (!empty($url[2])) {
                        if ($url[2] === "modifier") {
                            // Affiche le formulaire pour la modification du compte
                            $userController->modifyUser($url[3]);      
                        } else if ($url[2] === "modifierValidate") {
                            // Demarche d'ajout de la modification du compte en base de donnée 
                            $userController->modifyAccountValidate();
                        } else if ($url[2] === "supprimer") {
                            // Affiche un message de suppression (Confirmation obligatoire)
                            $userController->deleteUser($url[3]);
                        }
                    } else {
                        // Appel de la view et des information en cas de probleme 
                        $userController->sessionUser($_SESSION['user']);
                        unset($_SESSION['alert']);
                    }
                }
                break;
            default:
                // Le cas d'erreur ou l'url ne correspond a aucun case 
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    require 'views/error.view.php';
}
