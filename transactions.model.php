<?php
include_once "bd.manager.php";
include_once "transaction.model.php";
include_once "constante.php";

class TransactionsModel {
    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    public function create($transaction){
        $sql = Constante::$CREATE_TRANSACTION;
        $dicoParam = array(
            "reference" => $transaction->reference,
            "date" => $transaction->date,
            "type" => $transaction->type,
            "montant" => $transaction->montant,
            "idcmd" => $transaction->idcmd
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }
}
?>