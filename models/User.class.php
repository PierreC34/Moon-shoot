<?php
class User
{
    /*-----------------------------------------------------
                            Attributs :
    -----------------------------------------------------*/
    private $id_user;
    private $name_user;
    private $first_name_user;
    private $login_user;
    private $mdp_user;
    private $email;
    private $name_role;
    /*-----------------------------------------------------
                            Constucteur :
    -----------------------------------------------------*/
    public function __construct($id_user,$name_user, $first_name_user, $login_user, $mdp_user , $email , $name_role)
    {
        $this->id_user = $id_user;
        $this->name_user = $name_user;
        $this->first_name_user = $first_name_user;
        $this->login_user = $login_user;
        $this->mdp_user = $mdp_user;
        $this->email = $email;
        $this->name_role = $name_role;

    }
    /*-----------------------------------------------------
                        Getter and Setter :
        -----------------------------------------------------*/

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return htmlspecialchars($this->user);
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    //id_user Getter and Setter
    public function getIdUser()
    {
        return htmlspecialchars($this->id_user);
    }
    public function setIdUser($newIdUser)
    {
        $this->id_user = $newIdUser;

        return $this;
    }

    //name_user Getter and Setter
    public function getNameUser()
    {
        return htmlspecialchars($this->name_user);
    }
    public function setNameUser($newNameUser)
    {
        $this->name_user = $newNameUser;

        return $this;
    }

    //first_name_user Getter and Setter
    public function getFirstNameUser()
    {
        return htmlspecialchars($this->first_name_user);
    }
    public function setFirstNameUser($newFirstNameUser)
    {
        $this->first_name_user = $newFirstNameUser;

        return $this;
    }


    //login_user Getter and Setter
    public function getLoginUser()
    {
        return htmlspecialchars($this->login_user);
    }
    public function setLoginUser($newLoginUser)
    {
        $this->login_user = $newLoginUser;

        return $this;
    }


    //mdp_user Getter and Setter
    public function getMdpUser()
    {
        return htmlspecialchars($this->mdp_user);
    }
    public function setMdpUser($newMdpUser)
    {
        $this->mdp_user = $newMdpUser;

        return $this;
    }


    //Email Getter and Setter
    public function getEmail()
    {
        return htmlspecialchars($this->email);
    }
    public function setEmail($newEmail)
    {
        $this->mdp_user = $newEmail;

        return $this;
    }


    //Name_role Getter and Setter
    public function getName_role()
    {
        return htmlspecialchars($this->name_role);
    }
    public function setName_role($newName_role)
    {
        $this->newName_role = $newName_role;

        return $this;
    }

    // Fonction de hashage mdp
    public function cryptMdp()
    {
        $this->setMdpUser(md5($this->getMdpUser()));
    }
}
