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
}
?>