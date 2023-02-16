<?php
class Commande {
    public $id;
    public $libelle;
    public $date;
    public $statut;

    function __construct($id, $libelle, $date,$statut){
        $this->id = $id;
        $this->libelle = $libelle;
        $this->date = $date;
        $this->statut = $statut;
    }
}
?>