<?php
session_start();
$page = "livraisons";
include_once "livraison.model.php";
include_once "livraisons.model.php";
include_once "commande.model.php";
include_once "commandes.model.php";
$livraisonsModel = new LivraisonsModel();
$commandesModel = new CommandesModel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Livrer commande</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
$date = date("d-m-Y H:i:s");
$idlivraison = $_GET["idlivraison"];
$livraison = $livraisonsModel->selectById($idlivraison);
?>
Date : <?= $date ?><br>
<?php
$livraison = $livraison[0];
$idcmd = $livraison["idcmd"];
$idlivreur = $livraison["idlivreur"];
$date_affectation = $livraison["date_affectation"];
$date_livraison = $date;
$livraison_obj = new Livraison($idlivraison, $idcmd, $idlivreur, $date_affectation,$date_livraison);
$resultat = $livraisonsModel->update($livraison_obj);
$commande = $commandesModel->selectById($idcmd);
$commande->statut = "LIVRER";
$resultat1 = $commandesModel->update($commande);
if ($resultat->hasError == False && $resultat1->hasError == False){
?>
<br>
<h4>Mise à jour de la commande et de la livraison effectuées avec succès !</h4>
<?php
}
?>
</div>
<script src="bootstrap.min.js"></script>
</body>
</html>