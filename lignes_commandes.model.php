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
        $sql = Constante::$SELECT_LIGNES_COMS_BY_USER_ID;
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

    public function selectByLibelleCom($libelleCom){
        $sql = Constante::$SELECT_LIGNE_COM_BY_LIBELLE_COM;
        $entete = array("article","prix","qte","img_link");
        $dicoParam = array(
            "libelle" => $libelleCom
        );
        $data = [];
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        if ($resultat->hasError == False){
            $data = $resultat->data;
        }
        return $data;
    }

    public function update($ligneCom){
        $sql = Constante::$UPDATE_LIGNE_COM;
        $dicoParam = array(
            "idarticle" => $ligneCom->idarticle,
            "iduser" => $ligneCom->iduser,
            "qte" => $ligneCom->qte,
            "idcmd" => $ligneCom->idcmd,
            "id" => $ligneCom->id
        );
        $res = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $res;
    }
}
?>