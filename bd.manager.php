<?php
include_once "constante.php";
include_once "result.model.php";

class BdManager {
  private $db_host;
  private $db_user;
  private $db_pass;
  private $db_name;
  private $pdo;

  public $errors;
  public $hasError;

  public function __construct() {
	  	$this->hasError = false;
		try
		{
      		$dico = Constante::$LOCAL_BD_CONFIG;
			$this->_db_host = $dico["host"];
			$this->_db_user = $dico["user"];
			$this->_db_pass = $dico["password"];
			$this->_db_name = $dico["bdname"];
			$this->_pdo = new PDO('mysql:dbname=' . $this->_db_name . ';host=' . $this->_db_host, $this->_db_user, $this->_db_pass);
		}
		catch(Exception $e)
		{
            $this->hasError = true;
			$this->error = $e->getMessage();
		}
  }

  public function executeQuery($sql){
    $res = new Result();
    try {
        $result = $this->_pdo->query($sql, PDO::FETCH_CLASS, 'stdClass');
        $res->data = $result;
    }
    catch(Exception $e)
    {
        $res->hasError = true;
        $res->statut = $e->getMessage();
    }
    return $res;
  }

  function executePreparedQuery($sql, $dicoParam){
    $res = new Result();
    try {
		$stmt = $this->_pdo->prepare($sql);
		$stmt->execute($dicoParam);
	}
	catch(Exception $e)
	{
        $res->hasError = true;
        $res->statut = $e->getMessage();
	}
    return $res;
  }

  public function executeSelect($query, $entete){
        $res = new Result();
        try
        {
            $result = $this->_pdo->query($query, PDO::FETCH_CLASS, 'stdClass');
            if ($result)
            {
                while ($data = $result->fetch())
                {
                    if ($data != null)
                    {
                        $dc = array();
                        for ($i = 0 ; $i < count($entete) ; $i++)
                        {
                            $dc[$entete[$i]] = $data->{$entete[$i]};
                        }
                        $resultats[]=$dc;
                    }
                }
                $res->data = $resultats;
            }
        }
        catch(Exception $e)
        {
            $res->hasError = true;
            $res->statut = $e->getMessage();
        }
        return $res;
  }

  public function executePreparedSelect($sql, $dicoParam, $entete){
    $res = new Result();
    $resultats = array();
    try
    {
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute($dicoParam);
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $dc = array();
            for ($i = 0 ; $i < count($entete) ; $i++)
            {
                $dc[$entete[$i]] = $data[$entete[$i]];
            }
            $resultats[]=$dc;
        }
        $res->data = $resultats;
    }
    catch(Exception $e)
    {
        $res->hasError = true;
        $res->statut = $e->getMessage();
    }
    return $res;
  }
}
?>