<?php
class Commande {
    public $id;
    public $libelle;
    public $date;
    public $statut;
    public $montant;

    function __construct($id, $libelle, $date,$statut,$montant){
        $this->id = $id;
        $this->libelle = $libelle;
        $this->date = $date;
        $this->statut = $statut;
        $this->montant = $montant;
    }
}
?>