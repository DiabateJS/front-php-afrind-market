<?php
class Livraison {
    public $id;
    public $idcmd;
    public $idlivreur;
    public $date;
    public $date_livraison;

    function __construct($id, $idcmd, $idlivreur, $date,$date_livraison)
    {
        $this->id = $id;
        $this->idcmd = $idcmd;
        $this->idlivreur = $idlivreur;
        $this->date = $date;
        $this->date_livraison = $date_livraison;
    }
}
?>