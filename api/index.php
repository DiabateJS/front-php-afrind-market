<?php
include_once "../users.model.php";
include_once "../profils.model.php";
include_once "../articles.model.php";
include_once "../ligne_commande.model.php";
include_once "../lignes_commandes.model.php";
include_once "../commande.model.php";
include_once "../commandes.model.php";
include_once "../result.model.php";

$usersModel = new UsersModel();
$profilsModel = new ProfilsModel();
$articlesModel = new ArticleModel();
$lignesComsModel = new LignesCommandesModel();
$commandesModel = new CommandesModel();

$operation = $_GET["operation"];
$action = $_GET["action"];

if($operation == "users" && $action == "all"){
    $resultat = new Result();
    $users = $usersModel->getUsers();
    for ($i = 0 ; $i < count($users) ; $i++){
        $users[$i]->password = "";
    }
    $resultat->data = $users;
    echo json_encode($resultat);
}

if($operation == "users" && $action == "select" && isset($_GET["id"])){
    $resultat = new Result();
    $id = $_GET["id"];
    $users = $usersModel->selectById($id);
    if (count($users) == 1){
        $users[0]["pwd"] = "";
    }
    $resultat->data = $users;
    echo json_encode($resultat);
}

if($operation == "users" && $action == "auth" && isset($_GET["login"]) && isset($_GET["pwd"])){
    $login = $_GET["login"];
    $pwd = $_GET["pwd"];
    echo json_encode($usersModel->isAuth($login,$pwd));
}

if($operation == "profils" && $action == "all"){
    $resultat = new Result();
    $profils = $profilsModel->getProfils();
    $resultat->data = $profils;
    echo json_encode($resultat);
}

if($operation == "articles" && $action == "all"){
    $resultat = new Result();
    $articles = $articlesModel->getArticles();
    $resultat->data = $articles;
    echo json_encode($resultat);
}

if ($operation == "commandes" && $action == "all"){
    $resultat = $commandesModel->getCommandes();
    echo json_encode($resultat);
}

if ($operation == "commandes" && $action == "create" 
        && isset($_GET["idarticle"]) && isset($_GET["iduser"]) && isset($_GET["qte"])){
    $idarticle = $_GET["idarticle"];
    $libelle = "";
    $prix = "";
    $img = "";
    $idcmd = "";
    $iduser = $_GET["iduser"];
    $qte = $_GET["qte"];
    $ligneCom = new LigneCommande(0, $idarticle, $libelle, $prix, $img, $iduser, $qte, $idcmd);
    $resultat = $lignesComsModel->create($ligneCom);
    echo json_encode($resultat);
}

if ($operation == "commandes" && $action == "select_cmd_new" && isset($_GET["userid"])){
    $userId = $_GET["userid"];
    $resultat = $lignesComsModel->selectByUserId($userId);
    echo json_encode($resultat);
}

if ($operation == "commandes" && $action == "select_cmd_traite" && isset($_GET["userid"])){
    $userId = $_GET["userid"];
    $resultat = $commandesModel->selectByUserId($userId);
    echo json_encode($resultat);
}

?>