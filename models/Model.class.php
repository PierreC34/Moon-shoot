<?php
//abstract pour ne pas avoir à instancier la classe et surtout pour l'utiliser dans de futurs héritages


abstract class Model
{


    private $pdo;

    private function setDB()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=boutique_tattoo;charset=utf8", "PFComputer", "3f4f60f63a13f4f60f63a1");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getDB()
    {
        if ($this->pdo == null) {
            $this->setDb();
        }
        return $this->pdo;
    }
}
