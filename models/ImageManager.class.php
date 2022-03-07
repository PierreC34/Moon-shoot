<?php
require_once "Image.class.php";
require_once "Model.class.php";

class ImageManager extends Model
{
    //tableau d'images
    private $images; 

    // Ajout des images au tableau
    public function addImage($image)
    {
        $this->images[] = $image;
    }

    // Chargement des images (Tableau)
    public function getImages()
    {
        return $this->images;
    }

    // Chargement des images (base de données)
    public function loadingImages()
    {
        $sql = "SELECT * FROM images";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $images = $req->fetchAll(PDO::FETCH_OBJ);
        foreach ($images as $image) {
            $add = new Image($image->id_Image, $image->nom, $image->image);
            $this->addImage($add);
        }
    }

    // Chargement des images par l'id (base de donnée)
    public function getImageById($id)
    {
        foreach ($this->images as $image) {
            if ($image->getId() == $id) {
                return $image;
            }
        }
    }

    // Chargement des images par nom (base de donnée)
    public function getImageByName($name)
    {
        foreach ($this->images as $image) {
            if ($image->getTitle() == $name) {
                return $image;
            }
        }
    }

    // Ajout de l'image (base de donnée)
    public function addImageDB($title, $image)
    {
        $sql = "INSERT INTO images (nom, image) values (:nom,:image)";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":nom" => $title,
            ":image" => $image
        ]);
        if ($result) {
            $image = new Image($this->getDB()->lastInsertId(), $title, $image);
            $this->addImage($image);
        }
    }

    // Suppression de l'image par id (base de donnée)
    public function deleteImageDB($id)
    {
        $sql = "DELETE FROM images WHERE id_Image = :id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":id" => $id
        ]);
        if ($result) {
            $ImageToDelete = $this->getImageById($id);
            unset($ImageToDelete);
        }
    }

    // Modification image (base de donnée)
    public function modifyImageDB($id, $title, $image)
    {
        $sql = "UPDATE images set nom = :title, image=:image WHERE id_Image=:id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":title" => $title,
            ":image" => $image,
            ":id" => $id
        ]);
        if ($result) {
            $this->getImageById($id)->setTitle($title);
            $this->getImageById($id)->setImage($image);
        }
    }
}
