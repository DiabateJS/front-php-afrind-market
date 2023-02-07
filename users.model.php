<?php
include_once "bd.manager.php";
include_once "user.model.php";
include_once "constante.php";

class UsersModel {
    private $bdManager;

    function __construct()
    {
        $this->bdManager = new BdManager();
    }

    public function isAuth($login, $password){
        $sql = Constante::$AUTH_USER;
        $entete = array("id");
        $dicoParam = array(
            "login" => $login,
            "pwd" => $password
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat;
    }

    public function getUsers(){
        $sql = Constante::$SELECT_USER;
        $entete = array("id", "login", "pwd");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        $users = [];
        $user = null;
        if ($resultat->hasError == False){
            $res = $resultat->data;
            for ($i = 0 ; $i < count($res); $i++){  
                $id = $res[$i]["id"];
                $login = $res[$i]["login"];
                $pwd = $res[$i]["pwd"];
                $user = new User($id, $login, $pwd);
                $users[] = $user;
            }
        }
        return $user;
    }

    public function create($user){

    }
}