<?php
require_once "models/ImageManager.class.php";
require_once "globalController.controller.php";

$imageController = new ImageController;

class ImageController
{

    private $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager;
        $this->imageManager->loadingImages();
    }

    
    public function displayImages()
    {
        $images = $this->imageManager->getImages();
        require "views/galerie.view.php";
        unset($_SESSION['alert']);
    }

    public function addImage()
    {
        require "views/addImage.view.php";
    }

    public function addImageValidate()
    {
        $file = $_FILES['image'];
        $dir = "public/images/";
        try {
            if (empty($_POST['title'])) {
                $error = "Vous devez indiquer un titre";
            }
            if (!isset($file['name']) || empty($file['name'])) {
                $error .= "</br> Vous devez indiquer une image";
            }
            if (!empty($this->imageManager->getImageByName($_POST['title']))) {
                $error .= "</br> L'image' existe déjà. ";
            }
            if (!empty($error)) {
                throw new Exception($error);
            }
            $image = GlobalController::addImage($_POST['title'], $file, $dir);
            if (!empty($image)) {
                $this->imageManager->addImageDB($_POST['title'],$image);
            }
            GlobalController::alert("success", "Ajout Réalisée");
        } catch (Exception $e) {
            GlobalController::alert("danger", $e->getMessage());
        }

        header("Location: " . URL . "galerie");
    }

        public function displayImage($id)
    {
        $image = $this->imageManager->getImageById($id);
        if (empty($image)) {
            throw new Exception("Cette image n'existe pas");
        }
        require "views/galerie.view.php";
    }

    public function deleteImage($id)
    {
        $nomImage = $this->imageManager->getImageById($id)->getImage();
        unlink("public/images/$nomImage");
        $this->imageManager->deleteImageDB($id);
        GlobalController::alert("success", "Suppression Réalisée");
        header("Location: " . URL . "galerie");
    }

    public function modifyImage($id)
    {
        $image = $this->imageManager->getImageById($id);
        require "views/modifyImage.view.php";
    }
    public function modifyImageValidate()
    {
        try {
            $currentImage = $this->imageManager->getImageById($_POST['id'])->getImage();
            $file = $_FILES['image'];
            if ($file['size'] > 0) {
                $dir = "public/images/";
                $imageToAdd = GlobalController::addImage($_POST['title'], $file, $dir);
                unlink("public/images/$currentImage");
            } else {
                $imageToAdd = $currentImage;
                // if ($this->bookManager->getBookById($_POST['id'])->getTitle() !== $_POST['title']) {
                //     $extension = strtolower(pathinfo($imageToAdd, PATHINFO_EXTENSION));
                //     $random = rand(0, 99999);
                //     $imageToAdd = str_replace(" ", "_", $random . "_" . $_POST['title'] . "." . $extension);
                //     rename("public/images/" . $currentImage, "public/images/" . $imageToAdd);
                // }
            }
            $this->imageManager->modifyImageDB($_POST['id'], $_POST['title'], $imageToAdd);
            GlobalController::alert("success", "Modification Réalisée");
        } catch (Exception $e) {
            GlobalController::alert("danger", $e->getMessage());
        }

        header("Location: " . URL . "galerie");
    }
}
