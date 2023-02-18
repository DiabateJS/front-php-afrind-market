<?php
session_start();
$page = "articles";
include_once "transaction.model.php";
include_once "transactions.model.php";
include_once "commandes.model.php";
include_once "lignes_commandes.model.php";
include_once "articles.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Statut Commande</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
?>
<br>
<br>
<?php
$idcmd = $_POST["id_cmd"];
$montant = $_POST["montant"];
$moyen = $_POST["moyen_paiement"];
$date = $_POST["date_paiement"];
$ref = $_POST["ref_paiement"];
$commandesModel = new CommandesModel();
$commande = $commandesModel->selectById($idcmd);
?>
<h5><b>Informations commande</b></h5>
Libelle : <?= $commande->libelle ?><br>
Montant : <?= $commande->montant ?><br>
<br>
<br>
<h5><b>Informations paiement</b></h5><br>
Type de paiement : <?= $moyen ?><br>
Référence de paiement : <?= $ref ?><br>
Date paiement : <?= $date ?><br>
<br>
<?php
$transaction = new Transaction(0, $ref, $date, $moyen, $montant, $idcmd);
$transactionsModel = new TransactionsModel();
$resultat = $transactionsModel->create($transaction);
if ($resultat->hasError == False){
?>
<h5>Transaction crée avec succés !</h5>
<br>
<?php    
}
//Mise à jour du statut de la commande
$commande->statut = "REGLE";
$comModel = new CommandesModel();
$res = $comModel->update($commande);
if ($res->hasError == False){
?>
Statut de la commande mis à jour !<br>
<?php
}
//Mise à jour des stocks des articles de la commande
$lignesComModel = new LignesCommandesModel();
$libCom = $commande->libelle;
$lignes = $lignesComModel->selectByLibelleCom($libCom);
$ligne = null;
$idarticle = null;
$articleModel = new ArticleModel();
$article = null;
$result = null;
$res = True;
for ($i = 0 ; $i < count($lignes) ; $i++){
    $ligne = $lignes[$i];
    $idarticle = $ligne["idarticle"];
    $article = $articleModel->selectById($idarticle);
    $article->qte -= $ligne["qte"];
    $result = $articleModel->update($article);
    $res = $res && $result->hasError == False; 
}
if ($res == True){
?>
<br>
Stock des articles mis à jour !<br>
<?php    
}
?>
</div>
<script src="bootstrap.js"></script>
</body>
</html>