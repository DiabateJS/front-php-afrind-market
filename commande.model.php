<?php
class Commande {
    public $id;
    public $libelle;
    public $date;

    function __construct($id, $libelle, $date){
        $this->id = $id;
        $this->libelle = $libelle;
        $this->date = $date;
    }
}
?>