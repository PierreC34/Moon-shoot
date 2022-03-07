<?php
require_once "User.class.php";
require_once "Model.class.php";

class Usermanager extends Model
{
    //tableau d'utilisateur
    private $users; 

    // Ajout de l'utilisateur (tableau)
    public function addUser($user)
    {
        $this->users[] = $user;
    }

    // Chargement des utilisateurs (tableau)
    public function getUsers()
    {
        return $this->users;
    }
    
    public function loadingUsers()
    {
        $sql = "SELECT * FROM user";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_OBJ);
        foreach ($users as $user) {
            $add = new User($user->id_user, $user->name_user, $user->first_name_user, $user->login_user, $user->mdp_user, $user->email, $user->name_role);
            $this->addUser($add);
        }
    }

    function selectUserConnexion($login_user)
    {
        $sql = "SELECT DISTINCT * from user WHERE login_user = :login_user";
        $req =  $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":login_user" => $login_user,
        ]);
        $data = $req->fetch(PDO::FETCH_OBJ);
        if(!empty($data)){
            $user = new User($data->id_user, $data->name_user, $data->first_name_user, $data->login_user, $data->mdp_user, $data->email, $data->name_role);
            return $user;
        }else{
        return null ;
        }
    }

    public function getUserById($id_user)
    {
        foreach ($this->users as $user) {
            if ($user->getIdUser() == $id_user) {
                return $user;
            }
        }
    }

    public function getUserByName($name_user)
    {
        foreach ($this->users as $user) {
            if ($user->getNameUser() == $name_user) {
                return $user;
            }
        }
    }

    public function addUserDB($name_user, $first_name_user, $login_user, $mdp_user, $email,$name_role)
    {
        $sql = "INSERT INTO user(name_user, first_name_user, login_user, mdp_user ,email, name_role) VALUES (:name_user, :first_name_user, :login_user, :mdp_user, :email, :name_role)";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ':name_user' => $name_user,
            ':first_name_user' => $first_name_user,
            ':login_user' => $login_user,
            ':mdp_user' => $mdp_user,
            ':email' => $email,
            ':name_role' => $name_role
        ]);
        if ($result) {
            $user = new User($this->getDB()->lastInsertId(), $name_user, $first_name_user, $login_user, $mdp_user, $email , $name_role);
            $this->addUser($user);
        }
    }

    public function deleteUserDB($id_user)
    {
        $sql = "DELETE FROM user WHERE id_user = :id_user";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":id_user" => $id_user
        ]);
        if ($result) {
            $UserToDelete = $this->getUserById($id_user);
            unset($UserToDelete);
        }
    }

    public function modifyUserDB($id_user,$name_user, $first_name_user, $login_user, $mdp_user, $email)
    {
        $sql = "UPDATE user set name_user = :name_user, first_name_user=:first_name_user ,login_user = :login_user,mdp_user = :mdp_user,email = :email WHERE id_user=:id_user";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            'id_user' => $id_user,
            ':name_user' => $name_user,
            ':first_name_user' => $first_name_user,
            ':login_user' => $login_user,
            ':mdp_user' => $mdp_user,
            ':email' => $email
        ]);
    }
}
