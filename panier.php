<?php
session_start();
$page = "articles";
include_once "ligne_commande.model.php";
include_once "lignes_commandes.model.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Panier</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
?>
<br>
<h4>Votre Panier</h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
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
            <td><?= $lignes[$i]->id ?></td>
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
            <td colspan=5></td>
            <td><b><?= $total ?></b></td>
            <td></td>
        </tr>
    </thead>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
</body>
</html>