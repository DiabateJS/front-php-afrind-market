<?php
class User {
    public $id;
    public $login;
    public $password;
    public $email;
    public $adresse;

    function __construct($id, $login, $pwd, $email, $adresse)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $pwd;
        $this->email = $email;
        $this->adresse = $adresse;
    }
}