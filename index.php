<?php
include_once "articles.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Vente en ligne</title>
</head>
<body> 
<div class="articles">
<?php
for ($i = 0 ; $i < count($articles) ; $i++){ 
?>
    <div class="article">
        Id :  <?= $articles[$i]->id ?><br>
        Image : <?= $articles[$i]->img_link ?><br>
        <h3><b><?= $articles[$i]->libelle ?></b></h3>
        <i><?= $articles[$i]->prix ?> F CFA</i><br>
        <br>
        Disponible <br>
        Quantité : <?= $articles[$i]->qte ?><br>
        Commentaire : <?= $articles[$i]->commentaire ?> <br>
        <br>
        <button>Commander</button>
    </div>
<?php
}
?>
</div>
</body>
</html>