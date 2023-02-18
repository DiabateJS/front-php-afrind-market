<?php
include_once "bd.manager.php";
include_once "commande.model.php";
include_once "constante.php";

class CommandesModel {
    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    public function getCommandes(){
        $sql = Constante::$SELECT_COMMANDES;
        $entete = array("id","libelle","datecmd","statut","nom","prenom","email","adresse","telephone");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        return $resultat;
    }

    public function create($commande){
        $sql = Constante::$CREATE_COMMANDE;
        $dicoParam = array(
            "libelle" => $commande->libelle,
            "datecmd" => $commande->date,
            "statut" => $commande->statut
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }

    public function selectByLibelle($libelle){
        $sql = Constante::$SELECT_COMMANDE_BY_LIBELLE;
        $dicoParam = array(
            "libelle" => $libelle
        );
        $entete = array("id","libelle","datecmd","statut");
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        $res = $resultat->data;
        $commande = null;
        if (count($res) > 0){
            $id = $res[0]["id"];
            $libelle = $res[0]["libelle"];
            $datecmd = $res[0]["datecmd"];
            $statut = $res[0]["statut"];
            $commande = new Commande($id,$libelle,$datecmd,$statut);
        }
        return $commande;
    }

    public function selectByUserId($userId){
        $sql = Constante::$SELECT_COM_BY_USER_ID;
        $entete = array("id","libelle","datecmd","statut");
        $dicoParam = array(
            "iduser" => $userId
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        $res = $resultat->data;
        $commandes = [];
        $commande = null;
        for ($i = 0 ; $i < count($res) ; $i++){
            $id = $res[$i]["id"];
            $libelle = $res[$i]["libelle"];
            $datecmd = $res[$i]["datecmd"];
            $statut = $res[$i]["statut"];
            $commande = new Commande($id, $libelle, $datecmd, $statut);
            $commandes[] = $commande;
        }
        return $commandes;
    }
}
?>