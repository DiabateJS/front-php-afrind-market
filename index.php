<?php
session_start();
include_once "articles.model.php";
$profil = isset($_SESSION["profil"]) ? $_SESSION["profil"] : "";
$page = $profil == "livreur" ? "livraisons" : "articles";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne</title>
</head>
<body> 
<div class="container">
<br>
<?php
include "entete.php";
?>
<br>
<?php
if ($page == "articles"){
?>
<div class="articles">
<?php
for ($i = 0 ; $i < count($articles) ; $i++){ 
?>
    <div class="card article col-md-3 col-xs-12">
        <img src="<?= $articles[$i]->img_link ?>" class="card-img-top img-rounded img-responsive" style="max-width:250px;height:250px" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $articles[$i]->libelle ?></h5>
            <p class="card-text">
                <?= $articles[$i]->prix ?> F CFA<br>
                <?= $articles[$i]->qte ?> en stock<br>
                <br>
                <?= $articles[$i]->commentaire ?> <br>
            </p>
            <a href="commander.php?idarticle=<?= $articles[$i]->id ?>" class="btn btn-primary">Commander</a>
        </div>
    </div>
<?php
}
?>
</div>
<br>
</div>
<?php    
}
if ($page == "livraisons"){
$userid = $_SESSION["userid"];
include_once "livraisons.model.php";
$livraisonsModel = new LivraisonsModel();
$livraisons = $livraisonsModel->getCmdAlivrerByUserId($userid);
?>
<h4>Vos commandes</h4>
<br>
<h5>Commande à livrer</h5>
<br>
Vous avez <?= count($livraisons) ?> commande(s) à livrer<br>
<br>
<?php
if (count($livraisons) > 0){
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Ref</th>
            <th>Montant</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Date commande</th>
            <th>Date affectation</th>
            <th>Actions</th>
        </tr>
    </thead>
        <?php
            for ($i = 0 ; $i < count($livraisons) ; $i++){
        ?>
            <tr>
                <td><?= $livraisons[$i]["libelle"] ?></td>
                <td><?= $livraisons[$i]["montant"] ?></td>
                <td><?= $livraisons[$i]["nom_client"] ?></td>
                <td><?= $livraisons[$i]["prenom_client"] ?></td>
                <td><?= $livraisons[$i]["adresse_client"] ?></td>
                <td><?= $livraisons[$i]["telephone_client"] ?></td>
                <td><?= $livraisons[$i]["datecmd"] ?></td>
                <td><?= $livraisons[$i]["date_affectation"] ?></td>
                <td><a href="traiter_statut_livrer.php?idlivraison=<?= $livraisons[$i]["id"] ?>" class="btn btn-warning">Livrer</a></td>
            </tr>
        <?php        
            }
        ?>
    <tbody>
    </tbody>
</table>
<?php    
}
?>
<br>
<h5>Commandes livrées</h5>
<br>
<?php
$commandes_livrer = $livraisonsModel->getCmdLivrerByUserId($userid);
if (count($commandes_livrer) > 0){
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Ref</th>
            <th>Montant</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Date commande</th>
            <th>Date affectation</th>
            <th>Date livraison</th>
        </tr>
    </thead>
        <?php
            for ($i = 0 ; $i < count($commandes_livrer) ; $i++){
        ?>
            <tr>
                <td><?= $commandes_livrer[$i]["libelle"] ?></td>
                <td><?= $commandes_livrer[$i]["montant"] ?></td>
                <td><?= $commandes_livrer[$i]["nom_client"] ?></td>
                <td><?= $commandes_livrer[$i]["prenom_client"] ?></td>
                <td><?= $commandes_livrer[$i]["adresse_client"] ?></td>
                <td><?= $commandes_livrer[$i]["telephone_client"] ?></td>
                <td><?= $commandes_livrer[$i]["datecmd"] ?></td>
                <td><?= $commandes_livrer[$i]["date_affectation"] ?></td>
                <td><?= $commandes_livrer[$i]["date_livraison"] ?></td>
            </tr>
        <?php        
        }
        ?>
    <tbody>
    </tbody>
</table>
<?php
}
}
?>
<script src="bootstrap.js"></script>
</body>
</html>