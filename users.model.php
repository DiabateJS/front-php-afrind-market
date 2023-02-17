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
        $entete = array("id","email","nom","prenom","adresse","telephone","profil");
        $dicoParam = array(
            "login" => $login,
            "pwd" => $password
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat;
    }

    public function getUsers(){
        $sql = Constante::$SELECT_USERS;
        $entete = array("id", "login", "pwd","nom","prenom","email","adresse","telephone","profil");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        $users = [];
        $user = null;
        if ($resultat->hasError == False){
            $res = $resultat->data;
            for ($i = 0 ; $i < count($res); $i++){  
                $id = $res[$i]["id"];
                $login = $res[$i]["login"];
                $pwd = $res[$i]["pwd"];
                $nom = $res[$i]["nom"];
                $prenom = $res[$i]["prenom"];
                $email = $res[$i]["email"];
                $adresse = $res[$i]["adresse"];
                $telephone = $res[$i]["telephone"];
                $profil = $res[$i]["profil"];
                $user = new User($id, $login, $pwd, $nom, $prenom, $email,$adresse, $telephone, $profil);
                $users[] = $user;
            }
        }
        return $users;
    }

    public function selectById($id){
        $sql = Constante::$SELECT_USER_BY_ID;
        $entete = array("login", "pwd","nom","prenom","email","adresse","telephone","profil");
        $dicoParam = array(
            "id" => $id
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat->data;
    }

    public function selectUserByLibelleCom($libelleCom){
        $sql = "select distinct u.id, u.nom, u.prenom, u.email, u.adresse, u.telephone from commande c join ligne_commande l on c.id = l.idcmd join user u on u.id = l.iduser where c.libelle = :libelle";
        $entete = array("id","nom","prenom","email","adresse","telephone");
        $dicoParam = array(
            "libelle" => $libelleCom
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat->data;
    }

    public function create($user){
        $sql = Constante::$CREATE_USER;
        $dicoParam = array(
            "login" => $user->login,
            "pwd" => $user->password,
            "nom" => $user->nom,
            "prenom" => $user->prenom,
            "email" => $user->email,
            "adresse" => $user->adresse,
            "telephone" => $user->telephone,
            "profil" => $user->profil
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }
}