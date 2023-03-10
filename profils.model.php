<?php
include_once "bd.manager.php";
include_once "profil.model.php";
include_once "constante.php";

class ProfilsModel {
    private $bdManager;

    function __construct()
    {
        $this->bdManager = new BdManager();
    }

    public function getProfils(){
        $sql = Constante::$SELECT_PROFILS;
        $entete = array("id","libelle");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        $profils = [];
        $profil = null;
        if ($resultat->hasError == False){
            $res = $resultat->data;
            for ($i = 0 ; $i < count($res); $i++){  
                $id = $res[$i]["id"];
                $libelle = $res[$i]["libelle"];
                $profil = new Profil($id, $libelle);
                $profils[] = $profil;
            }
        }
        return $profils;
    }

    public function create($profil){
        $sql = Constante::$CREATE_PROFIL;
        $dicoParam = array(
            "libelle" => $profil->libelle
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }

    public function delete($idProfil){
        $sql = Constante::$DELETE_PROFIL;
        $dicoParam = array(
            "id" => $idProfil
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }
}
?>