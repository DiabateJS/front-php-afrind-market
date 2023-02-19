<?php
class Livraison {
    public $id;
    public $idcmd;
    public $idlivreur;
    public $date;

    function __construct($id, $idcmd, $idlivreur, $date)
    {
        $this->id = $id;
        $this->idcmd = $idcmd;
        $this->idlivreur = $idlivreur;
        $this->date = $date;
    }
}
?>