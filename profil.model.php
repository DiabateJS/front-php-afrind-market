<?php
class Profil {
    public $id;
    public $libelle;

    function __construct($id, $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }
}
?>