<?php
class LigneCommande {
    public $id;
    public $idarticle;
    public $libelle;
    public $prix;
    public $img;
    public $iduser;
    public $qte;
    public $idcmd;

    function __construct($id, $idarticle, $libelle, $prix, $img, $iduser, $qte, $idcmd)
    {
        $this->id = $id;
        $this->idarticle = $idarticle;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->img = $img;
        $this->iduser = $iduser;
        $this->qte = $qte;
        $this->idcmd = $idcmd;
    }
}
?>