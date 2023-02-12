<?php
session_start();
include_once "ligne_commande.model.php";
include_once "lignes_commandes.model.php";
$page = "articles";
$ligneComModel = new LignesCommandesModel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Ligne Commande</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
$idarticle = $_POST["idarticle"];
$iduser = $_POST["iduser"];
$qte = $_POST["qte"];
$idcmd = "";
$ligneCom = new LigneCommande(0, $idarticle, $iduser, $qte, $idcmd);
$resultat = $ligneComModel->create($ligneCom);
?>
<br>
Date : <?= date("d-m-Y H:i:s") ?><br>
<?php
if ($resultat->hasError == False){
?>
<h4>Article ajouté dans votre panier avec succes !</h4>
<?php    
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>