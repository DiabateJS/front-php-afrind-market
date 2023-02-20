<?php
include_once "bd.manager.php";
include_once "livraison.model.php";

class LivraisonsModel {
    private $bdManager;

    function __construct()
    {
        $this->bdManager = new BdManager();
    }

    public function create($livraison){
        $sql = Constante::$CREATE_LIVRAISON_CMD;
        $dicoParam = array(
            "idcmd" => $livraison->idcmd,
            "idlivreur" => $livraison->idlivreur,
            "date" => $livraison->date
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }

    public function getCmdAlivrerByUserId($userId){
        $sql =  Constante::$SELECT_COMMANDE_A_LIVRER_BY_LIVREUR_ID;
        $entete = array("id", "idcmd", "libelle", "idclient", "nom_client", "prenom_client", "adresse_client", "telephone_client", "montant", "datecmd", "date_affectation");
        $dicoParam = array(
            "userid" => $userId
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat->data;
    }
}
?>