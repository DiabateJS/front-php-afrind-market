<?php
class Transaction {
    public $id;
    public $reference;
    public $date;
    public $type;
    public $montant;
    public $idcmd;

    function __construct($id, $ref, $date, $type, $montant, $idcmd)
    {
        $this->id = $id;
        $this->reference = $ref;
        $this->date = $date;
        $this->type = $type;
        $this->montant = $montant;
        $this->idcmd = $idcmd;
    }
}
?>