<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
$operation = $_POST["operation"];
if ($operation == "enregistrer"){
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
}else{
    header('Location: nouveau.php');
}
?>
</div>
<script src="bootstrap.js"></script>
</body>
</html>