<?php
class LigneCommande {
    public $id;
    public $idarticle;
    public $iduser;
    public $qte;
    public $idcmd;

    function __construct($id, $idarticle, $iduser, $qte, $idcmd)
    {
        $this->id = $id;
        $this->idarticle = $idarticle;
        $this->iduser = $iduser;
        $this->qte = $qte;
        $this->idcmd = $idcmd;
    }
}
?>