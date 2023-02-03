<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Création Article</title>
</head>
<body>
<div class="container">
<?php
$page = "article";
include "entete.php";
include_once "article.model.php";
include_once "articles.model.php";
?>
<br>
<br>
<?php
$id = 0;
$libelle = $_POST["libelle"];
$prix = $_POST["prix"];
$qte = $_POST["qte"];
$commentaire = $_POST["commentaire"];

$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['img_link']['name']);
if (move_uploaded_file($_FILES['img_link']['tmp_name'], $uploadfile)) {
    $img = $uploaddir. $_FILES["img_link"]['name'];
}

$article = new Article($id, $libelle, $prix, $qte, $img, $commentaire);
$articleModel = new ArticleModel();
$res = $articleModel->create($article);
if (!$res->hasError){
?>
    <h3>Article créer avec succès !</h3>
    <br>
    <?= $article->libelle ?><br>
    Prix : <?= $article->prix ?><br>
    Quantité : <?= $article->qte ?><br>
    <?= $article->commentaire ?>
<?php
}else{
?>
   <h3>Erreur survenue à la création de l'article</h3>
   <br>
   <?= $res->data ?><br>
<?php
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>