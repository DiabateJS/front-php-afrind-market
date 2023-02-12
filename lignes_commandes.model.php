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

    public function selectByUserId($userId){
        $sql = "select l.id, l.idarticle, a.libelle, a.img_link, a.prix, l.qte from ligne_commande l join article a on l.idarticle = a.id where l.iduser = :iduser";
        $entete = array("id","idarticle","libelle","img_link","prix","qte");
        $dicoParam = array(
            "iduser" => $userId
        );
        $res = [];
        $lignes = [];
        $ligne = null;
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        if ($resultat->hasError == False){
            $res = $resultat->data;
        }
        for ($i = 0 ; $i < count($res) ; $i++){
            $id = $res[$i]["id"];
            $idarticle = $res[$i]["idarticle"];
            $libelle = $res[$i]["libelle"];
            $prix = $res[$i]["prix"];
            $img = $res[$i]["img_link"];
            $qte = $res[$i]["qte"];
            $ligne = new LigneCommande($id, $idarticle, $libelle, $prix, $img, $userId, $qte, "");
            $lignes[] = $ligne;
        }
        return $lignes;
    }
}
?>