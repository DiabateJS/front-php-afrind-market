<?php
class User {
    public $id;
    public $login;
    public $password;
    public $nom;
    public $prenom;
    public $email;
    public $adresse;
    public $telephone;
    public $profil;

    function __construct($id, $login, $pwd, $nom, $prenom, $email, $adresse, $telephone, $profil)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $pwd;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->profil = $profil;
    }
}