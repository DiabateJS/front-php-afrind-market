<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
    <div class="card article" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $articles[$i]->libelle ?></h5>
            <p class="card-text">
                Id :  <?= $articles[$i]->id ?><br>
                Image : <?= $articles[$i]->img_link ?><br>
                Quantité : <?= $articles[$i]->qte ?><br>
                Commentaire : <?= $articles[$i]->commentaire ?> <br>
            </p>
            <a href="#" class="btn btn-primary">Commander</a>
        </div>
    </div>
<?php
}
?>
</div>
<br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>