<?php
session_start();
$page = "articles";
include_once "ligne_commande.model.php";
include_once "lignes_commandes.model.php";
include_once "commandes.model.php";

$userId = isset($_GET["userid"]) ? $_GET["userid"] : "";
$ligneComModel = new LignesCommandesModel();
$lignes = $ligneComModel->selectByUserId($userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Panier</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
if (count($lignes) == 0){
?>
<h4>Votre Panier est vide</h4>
<?php
} 
else
{
?>
<br>
<h4>Votre Panier</h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Article</th>
            <th>Prix</th>
            <th>Qte</th>
            <th>Montant</th>
            <th>Actions</th>
        </tr>
    </thead>
    <thead>
        <?php
        $montant = 0;
        $total = 0;
        for ($i = 0 ; $i < count($lignes) ; $i++){
            $montant = $lignes[$i]->qte * $lignes[$i]->prix;
            $total += $montant; 
        ?>
        <tr>
            <td><img src="<?= $lignes[$i]->img ?>" style="width:50px;height:50px;"></td>
            <td><?= $lignes[$i]->libelle ?></td>
            <td><?= $lignes[$i]->prix ?></td>
            <td><?= $lignes[$i]->qte ?></td>
            <td><?= $montant ?></td>
            <td><button class="btn btn-success">Modifier</button>  <button class="btn btn-danger">Supprimer</button></td>
        </tr>
        <?php
        }
        ?>
        <tr style="height:50px;">
            <td colspan=4></td>
            <td><b><?= $total ?></b></td>
            <td><a href="traiter_panier.php?userid=<?= $userId ?>" class="btn btn-warning">Commander</a></td>
        </tr>
    </thead>
</table>
<?php
}
$commandesModel = new CommandesModel();
$commandes = $commandesModel->selectByUserId($userId);
if (count($commandes) == 0){
?>
<h4>Vous m'avez pas de commande</h4>
<?php
}else {
?>
<h4>Vos commandes</h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Libelle</th>
            <th>Montant</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0 ; $i < count($commandes) ; $i++){ ?>
            <tr>
                <td><?= $commandes[$i]->date ?></td>
                <td><?= $commandes[$i]->libelle ?></td>
                <td><?= $commandes[$i]->montant ?></td>
                <td><?= $commandes[$i]->statut ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>
</div>
<script src="bootstrap.min.js"></script>
</body>
</html>