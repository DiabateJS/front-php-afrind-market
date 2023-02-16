<?php
include_once "bd.manager.php";
include_once "commande.model.php";

class CommandesModel {
    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    public function getCommandes(){
        $sql = "select distinct c.id, c.libelle, c.datecmd, l.iduser, u.nom, u.prenom, u.email, u.adresse from commande c join ligne_commande l on c.id = l.idcmd join user u on l.iduser = u.id";
        $entete = array("id","libelle","datecmd","nom","prenom","email","adresse");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        return $resultat;
    }

    public function create($commande){
        $sql = "insert into commande(libelle, datecmd) value (:libelle, :datecmd)";
        $dicoParam = array(
            "libelle" => $commande->libelle,
            "datecmd" => $commande->date
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }

    public function selectByLibelle($libelle){
        $sql = "select id, libelle, datecmd from commande where libelle = :libelle";
        $dicoParam = array(
            "libelle" => $libelle
        );
        $entete = array("id","libelle","datecmd");
        $resultat = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        $res = $resultat->data;
        $commande = null;
        if (count($res) > 0){
            $id = $res[0]["id"];
            $libelle = $res[0]["libelle"];
            $datecmd = $res[0]["datecmd"];
            $commande = new Commande($id,$libelle,$datecmd);
        }
        return $commande;
    }

    public function selectByUserId($userId){
        $sql = Constante::$SELECT_COM_BY_USER_ID;
        $entete = array("id","libelle","datecmd");
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
            $commande = new Commande($id, $libelle, $datecmd);
            $commandes[] = $commande;
        }
        return $commandes;
    }
}
?>