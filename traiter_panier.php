<?php
session_start();
$page = "articles";
include_once "commande.model.php";
include_once "commandes.model.php";
include_once "lignes_commandes.model.php";
include_once "users.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Traiter Panier</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
$usersModel = new UsersModel();
?>
<?php
$userid = $_GET["userid"];
$libelle = "AF".date("dmYHis");
$date = date("d-m-Y H:i:s");
$user = $usersModel->selectById($userid)[0];
?>
<h4>Commande : <?= $libelle ?></h4><br>
Nom : <?= $user["nom"] ?><br>
Prenom : <?= $user["prenom"] ?><br>
Adresse de facturation : <?= $user["adresse"] ?><br>
<?php
//1. Créer une commande
$commande = new Commande(0,$libelle,$date);
$commandeModel = new CommandesModel();
$res = $commandeModel->create($commande);
//Récupérer l'identifiant de la commande créee
$commande = $commandeModel->selectByLibelle($libelle);
$idcmd = $commande->id;
//2. Ajouter l'identifiant de la commande créee dans les lignes de commande
$lignesComModel = new LignesCommandesModel();
$lignes = $lignesComModel->selectByUserId($userid);
$ligne = null;
for ($i = 0 ; $i < count ($lignes) ; $i++){
    $ligne = $lignes[$i];
    $ligne->idcmd = $idcmd;
    $lignesComModel->update($ligne);
}
?>
<br>
<h5>Votre commande a été crée avec succes !</h5>
</div>
<script src="bootstrap/min.js"></script>
</body>
</html>