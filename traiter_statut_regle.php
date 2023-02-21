<?php
session_start();
$page = "administration";
include_once "commandes.model.php";
include_once "livraison.model.php";
include_once "livraisons.model.php";
include_once "users.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Affecter commande</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
$date = date("d-m-Y H:i:s");
$idcmd = $_POST["idcommande"];
$idlivreur = $_POST["idlivreur"];
$livraison = new Livraison(0,$idcmd, $idlivreur, $date,"");
$livraisonsModel = new LivraisonsModel();
$commandesModel = new CommandesModel();
$commande = $commandesModel->selectById($idcmd);
$usersModel = new UsersModel();
$livreur = $usersModel->selectById($idlivreur);
$livreur = $livreur[0];
?>
<br>
Commande : <?= $commande->libelle ?><br>
Livreur : <?= $livreur["nom"]." ".$livreur["prenom"] ?><br>
<?php
$commande->statut = "A_LIVRER";
$res = $commandesModel->update($commande);
$resultat = $livraisonsModel->create($livraison);
if ($res->hasError == False && $resultat->hasError == False){
?>
<h4>Commande affectée au livreur avec succès !</h4>
<?php    
}
?>
</div> 
<script src="bootstrap.js"></script>
</body>
</html>