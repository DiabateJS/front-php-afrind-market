<?php
include_once "bd.manager.php";
include_once "ligne_commande.model.php";
include_once "constante.php";

class LignesCommandesModel {
    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    public function create($ligneCom){
        $sql = Constante::$CREATE_LIGNE_COM;
        $dicoParam = array(
            "idarticle" => $ligneCom->idarticle,
            "iduser" => $ligneCom->iduser,
            "qte" => $ligneCom->qte
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }
}
?>