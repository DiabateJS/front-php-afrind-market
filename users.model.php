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
        $entete = array("id","email","adresse");
        $dicoParam = array(
            "login" => $login,
            "pwd" => $password
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat;
    }

    public function getUsers(){
        $sql = Constante::$SELECT_USERS;
        $entete = array("id", "login", "pwd","email","adresse");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        $users = [];
        $user = null;
        if ($resultat->hasError == False){
            $res = $resultat->data;
            for ($i = 0 ; $i < count($res); $i++){  
                $id = $res[$i]["id"];
                $login = $res[$i]["login"];
                $pwd = $res[$i]["pwd"];
                $email = $res[$i]["email"];
                $adresse = $res[$i]["adresse"];
                $user = new User($id, $login, $pwd,$email,$adresse);
                $users[] = $user;
            }
        }
        return $user;
    }

    public function selectById($id){
        $sql = Constante::$SELECT_USER_BY_ID;
        $entete = array("login", "pwd","email","adresse");
        $dicoParam = array(
            "id" => $id
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat->data;
    }

    public function create($user){
        $sql = Constante::$CREATE_USER;
        $dicoParam = array(
            "login" => $user->login,
            "pwd" => $user->password,
            "email" => $user->email,
            "adresse" => $user->adresse
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }
}