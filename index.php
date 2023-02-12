<?php
session_start();
include_once "articles.model.php";
$page = "articles";
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
<script src="bootstrap.js"></script>
</body>
</html>