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
        $sql = "select distinct l.id, l.idcmd, c.libelle, lc.iduser as idclient, u.nom as nom_client, u.prenom as prenom_client, u.adresse as adresse_client, u.telephone as telephone_client, c.montant, c.datecmd, l.date as date_affectation from livrer_commande l join commande c on l.idcmd = c.id join ligne_commande lc on lc.idcmd = l.idcmd join user u on u.id = lc.iduser where c.statut = 'A_LIVRER' and l.idlivreur = :userid";
        $entete = array("id", "idcmd", "libelle", "idclient", "nom_client", "prenom_client", "adresse_client", "telephone_client", "montant", "datecmd", "date_affectation" );
        $dicoParam = array(
            "userid" => $userId
        );
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $resultat->data;
    }
}
?>