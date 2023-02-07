<?php
class User {
    public $id;
    public $login;
    public $password;

    function __construct($id, $login, $pwd)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $pwd;
    }
}