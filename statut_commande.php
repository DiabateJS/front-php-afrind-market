<?php
session_start();
$page = "administration";
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
    <title>Vente en ligne - Changement Statut Commande</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
$libelle_cmd = $_GET["libelle"];
$commandesModel = new CommandesModel();
$commande = $commandesModel->selectByLibelle($libelle_cmd);
$statut = $commande->statut;
?>
<br>
<?php
if ($statut == "A_REGLER"){
?>
<div class="row">
<div class="col-6">
<h5> Reglement de la commande <?= $libelle_cmd ?></h5>
<br>
<b>Moyen de paiement</b> <br>
<br>
<input type="radio" name="moyen_paiement" checked> Espece <br>
<input type="radio" name="moyen_paiement"> Mobile Money <br>
<input type="radio" name="moyen_paiement"> Virement bancaire <br>
<br>
<b>Preuve de paiement</b><br>
<br>
<label for="date_paiement">Date transaction</label>
<input type="date" name="date_paiement"><br>
<br>
<label for="ref_paiement">Reférence transaction</label>
<input type="text" name="ref_paiement">
<br>
<br>
<button class="btn btn-warning">Valider</button>
</div>
<div class="col-6">
<b>Client</b><br>
<?php
$usersModel = new UsersModel();
$user = $usersModel->selectUserByLibelleCom($libelle_cmd);
$user = $user[0];
?>
Nom : <?= $user["nom"] ?> <?= $user["prenom"] ?><br>
Email : <?= $user["email"] ?><br>
Telephone : <?= $user["telephone"] ?><br>
Adresse : <?= $user["adresse"] ?><br>
Date commande : <?= $commande->date ?>
<br>
<br>
<b>Détails de la commande</b><br>
<br> 
<?php
$lignesComModel = new LignesCommandesModel();
$lignes = $lignesComModel->selectByLibelleCom($libelle_cmd);
?>
<table class="table table-striped">
<thead>
    <tr>
        <th>Image</th>
        <th>Article</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th>Montant</th>
    </tr>
</thead>
<tbody>
    <?php
        $total = 0;
        $montant = 0;
        for ($i = 0 ; $i < count($lignes) ; $i++){
            $montant = $lignes[$i]["qte"] * $lignes[$i]["prix"];
            $total += $montant;
    ?>
        <tr>
            <td><img src="<?= $lignes[$i]["img_link"] ?>" style="width:50px;height:50px"></td>
            <td><?= $lignes[$i]["article"] ?></td>
            <td><?= $lignes[$i]["qte"] ?></td>
            <td><?= $lignes[$i]["prix"] ?></td>
            <td><?= $montant ?></td>
        </tr>
    <?php        
        }
    ?>
    <tr>
        <td colspan=4><b>Total</b> </td>
        <td><b><?= $total ?></b></td>
    </tr>
</tbody>
</table>
</div>
</div>
<?php
}
if ($statut == "REGLER"){

}
if ($statut == "A_LIVRER"){

}
if ($statut == "LIVRER"){

}
?>
</div>
<script src="bootstrap.min.js"></script> 
</body>
</html>