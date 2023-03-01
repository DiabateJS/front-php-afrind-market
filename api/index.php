<?php
include_once "../users.model.php";
include_once "../profils.model.php";
include_once "../articles.model.php";
include_once "../ligne_commande.model.php";
include_once "../lignes_commandes.model.php";
include_once "../commande.model.php";
include_once "../commandes.model.php";
include_once "../transaction.model.php";
include_once "../transactions.model.php";
include_once "../livraison.model.php";
include_once "../livraisons.model.php";
include_once "../result.model.php";

$usersModel = new UsersModel();
$profilsModel = new ProfilsModel();
$articlesModel = new ArticleModel();
$lignesComsModel = new LignesCommandesModel();
$commandesModel = new CommandesModel();
$transactionsModel = new TransactionsModel();
$livraisonsModel = new LivraisonsModel();

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

if ($operation == "commandes" && $action == "traiter_panier" && isset($_GET["userid"])){
    $userid = $_GET["userid"];
    $libelle = "AF".date("dmYHis");
    $date = date("d-m-Y H:i:s");
    $user = $usersModel->selectById($userid)[0];
    //1. Créer une commande
    $statut = "A_REGLER";
    $montant = 0;
    $commande = new Commande(0,$libelle,$date,$statut,$montant);
    $res = $commandesModel->create($commande);
    //Récupérer l'identifiant de la commande créee
    $commande = $commandesModel->selectByLibelle($libelle);
    $idcmd = $commande->id;
    //2. Ajouter l'identifiant de la commande créee dans les lignes de commande
    $lignes = $lignesComsModel->selectByUserId($userid);
    $ligne = null;
    for ($i = 0 ; $i < count ($lignes) ; $i++){
        $ligne = $lignes[$i];
        $ligne->idcmd = $idcmd;
        $lignesComsModel->update($ligne);
    }
    //3. Mise à jour de la commande avec le montant de la commande
    $montant = $commandesModel->getMontantWithCmdLibelle($libelle);
    $commande->montant = $montant;
    $resultat = $commandesModel->update($commande);
    echo json_encode($resultat);
}

if ($operation == "commandes" && $action == "selectLignesByRefCom" && isset($_GET["reference"])){
    $ref = $_GET["reference"];
    $resultat = $lignesComsModel->selectByLibelleCom($ref);
    echo json_encode($resultat);
}

if ($operation == "commandes" && $action == "regler_commande" 
                              && isset($_GET["idcmd"]) && isset($_GET["montant"])
                              && isset($_GET["moyen_paiement"]) && isset($_GET["date_paiement"]) 
                              && isset($_GET["ref_paiement"])){
    $idcmd = $_GET["idcmd"];
    $montant = $_GET["montant"];
    $moyen_paiement = $_GET["moyen_paiement"];
    $date_paiement = $_GET["date_paiement"];
    $ref_paiement = $_GET["ref_paiement"];

    $commande = $commandesModel->selectById($idcmd);

    $transaction = new Transaction(0, $ref_paiement, $date_paiement, $moyen_paiement, $montant, $idcmd);
    $resultat = $transactionsModel->create($transaction);

    //Mise à jour du statut de la commande
    $commande->statut = "REGLE";
    $res = $commandesModel->update($commande);
    if ($res->hasError == False){
        //Mise à jour des stocks des articles de la commande
        $libCom = $commande->libelle;
        $lignes = $lignesComsModel->selectByLibelleCom($libCom);
        $ligne = null;
        $idarticle = null;
        $article = null;
        $result = null;
        $res = True;
        for ($i = 0 ; $i < count($lignes) ; $i++){
            $ligne = $lignes[$i];
            $idarticle = $ligne["idarticle"];
            $article = $articlesModel->selectById($idarticle);
            $article->qte -= $ligne["qte"];
            $result = $articlesModel->update($article);
            $res = $res && $result->hasError == False; 
        }
        echo json_encode($result);
    }else{
        echo json_encode($res);
    }
}

if ($operation == "commandes" && $action == "affecter_livreur" 
                              && isset($_GET["idcmd"]) && isset($_GET["idlivreur"])){
    $idcmd = $_GET["idcmd"];
    $idlivreur = $_GET["idlivreur"];
    $date = date("d-m-Y H:i:s");
    $livraison = new Livraison(0,$idcmd, $idlivreur, $date,"");
    $commande = $commandesModel->selectById($idcmd);
    $livreur = $usersModel->selectById($idlivreur);
    $livreur = $livreur[0];
    
    $commande->statut = "A_LIVRER";
    $res = $commandesModel->update($commande);
    $resultat = $livraisonsModel->create($livraison);
    echo json_encode($resultat);
}

if ($operation == "livraisons" && $action == "cmd_a_livrer" && isset($_GET["userid"])){
    $userid = $_GET["userid"];
    $livraisons = $livraisonsModel->getCmdAlivrerByUserId($userid);
    echo json_encode($livraisons);
}

if ($operation == "livraisons" && $action == "cmd_livrer" && isset($_GET["userid"])){
    $userid = $_GET["userid"];
    $livraisons = $livraisonsModel->getCmdLivrerByUserId($userid);
    echo json_encode($livraisons);
}

if ($operation == "livraisons" && $action == "livrer" 
                               && isset($_GET["idLivraison"]) && isset($_GET["idcmd"])
                               && isset($_GET["idLivreur"])){
        $date = date("d-m-Y H:i:s");
        $idlivraison = $_GET["idLivraison"];
        $idlivreur = $_GET["idLivreur"];
        $idcmd = $_GET["idcmd"];

        $livraison = $livraisonsModel->selectById($idlivraison);
        $livraison = $livraison[0];
        $date_affectation = $livraison["date_affectation"];
        $date_livraison = $date;
        $livraison_obj = new Livraison($idlivraison, $idcmd, $idlivreur, $date_affectation,$date_livraison);
        $resultat = $livraisonsModel->update($livraison_obj);
        $commande = $commandesModel->selectById($idcmd);
        $commande->statut = "LIVRER";
        $resultat1 = $commandesModel->update($commande);
        echo json_encode($resultat1);
}

?>