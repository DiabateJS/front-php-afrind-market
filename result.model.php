<?php
class Result {
    public $statut;
    public $hasError;
    public $data;

    function __construct()
    {
        $this->statut = 200;
        $this->hasError = false;
        $this->data = null;
    }
}
?>