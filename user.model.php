<?php
class User {
    public $id;
    public $login;
    public $password;
    public $email;
    public $adresse;
    public $profil;

    function __construct($id, $login, $pwd, $email, $adresse, $profil)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $pwd;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->profil = $profil;
    }
}