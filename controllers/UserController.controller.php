<?php
require_once "models/UserManager.class.php";
require_once "globalController.controller.php";

class UserController
{
    
    private $userManager;


    public function __construct()
    {

        $this->userManager = new UserManager;
        $this->userManager->loadingUsers();
    }

    public function connexion(){
        try{
            if (empty($_POST['login_user']) || empty($_POST['mdp_user'])) {
                throw new Exception("Ta pas tout remplis gros");
            }
            $user = $this->userManager->selectUserConnexion($_POST['login_user']); 

            if(!empty($user)){
                if (password_verify($_POST['mdp_user'], $user->getMdpUser())){           
                    $_SESSION['user'] = $user; 
                    header("location:" . URL . "compte/moncompte");
                } else {
                    header("location:" . URL . "compte");
                    throw new Exception("T'es claquer gros");
                    unset($_SESSION['alert']);
                }
            }else{
                header("location:" . URL . "compte");
                throw new Exception("L'utilisateur n'existe pas ");       
            }
            GlobalController::alert("success", "Connecter");
        }catch(Exception $e){
            GlobalController::alert("danger", $e->getMessage());
        }
    }

    public function sessionUser($user){
        require "views/myAccount.view.php";
        unset($_SESSION['alert']);
    }

    public function deconnection(){
        session_destroy();
        header("location:".URL);
    }

    public function addAccount()
    {
        require "views/addAccount.view.php";
    }

    public function addAccountValidate()
    {
        try {
            if (empty($_POST['name_user'])) {
                $error = "Vous devez indiquer un nom";
            }
            if (empty($_POST['first_name_user'])) {
                $error = "Vous devez indiquer un prénom ";
            }
            if (empty($_POST['login_user'])) {
                $error = "Vous devez indiquer pseudo d'utilisateur";
            }
            if (empty($_POST['email'])) {
                $error = "Vous devez indiquer une adresse mail";
            }
            if (empty($_POST['mdp_user'])) {
                $error = "Vous devez indiquer un mot de passe";
            }
            if (empty($_POST['name_role'])) {
                $error = "Vous devez indiquer un nom de rôle";
            }
            if (!empty($error)) {
                throw new Exception($error);
            }
            else if (empty($error)) {
                
                $hash = password_hash($_POST['mdp_user'], PASSWORD_DEFAULT);

                $this->userManager->addUserDB($_POST['name_user'], $_POST['first_name_user'], $_POST['login_user'], $hash, $_POST['email'], $_POST['name_role']);
            }
            GlobalController::alert("success", "Ajout du compte réalisée");
        } catch (Exception $e) {
            GlobalController::alert("danger", $e->getMessage());
        }
        // CHEMIN SUITE A LA CREATION DE COMPTE 
        header("Location: " . URL . "compte");
    }

    public function deleteUser($id_user)
    {
        if(empty($_SESSION["user"])){
            header("Location: " . URL . "error");
        }else{
        $this->userManager->deleteUserDB($id_user);
        
        GlobalController::alert("success", "Suppression du compte Réalisée");
        // CHEMIN SUITE A LA SUPPRESION DE COMPTE 
        header("Location: " . URL . "compte");
        session_destroy();
        }
    }

    
    public function modifyUser($id_user)
    {
        $user = $this->userManager->getUserById($id_user);
        require "./views/modifyAccount.view.php";
        unset($_SESSION['alert']);
        
    }
    public function modifyAccountValidate()
    {
        try {
            if (empty($_POST['name_user'])) {
                $error = "Vous devez indiquer un nom";
            }
            if (empty($_POST['first_name_user'])) {
                $error = "Vous devez indiquer un prénom ";
            }
            if (empty($_POST['login_user'])) {
                $error = "Vous devez indiquer pseudo d'utilisateur";
            }
            if (empty($_POST['email'])) {
                $error = "Vous devez indiquer une adresse mail";
            }
            if (empty($_POST['mdp_user'])) {
                $error = "Vous devez indiquer un mot de passe";
            }
            if (!empty($error)) {
                throw new Exception($error);
            }
            $hash = password_hash($_POST['mdp_user'], PASSWORD_DEFAULT);
            $this->userManager->modifyUserDB($_SESSION['user']->getIdUser(),$_POST['name_user'], $_POST['first_name_user'], $_POST['login_user'], $hash, $_POST['email']);
            GlobalController::alert("success", "Modification du compte réalisée");
        } catch (Exception $e) {
            GlobalController::alert("danger", $e->getMessage());
        }

        header("Location: " . URL . "compte/moncompte");
    }

    // public function displayUsers()
    // {
    //     $users = $this->userManager->getUsers();
    //     require "views/fullusers.view.php";
    //     unset($_SESSION['alert']);
    // }

    // public function displayUser($id_user)
    // {
    //     $user = $this->userManager->getUserById($id_user);
    //     if (empty($user)) {
    //         throw new Exception("Cette utilisateur n'existe pas");
    //     }
    //     require "views/fullusers.view.php";
    // }
}
