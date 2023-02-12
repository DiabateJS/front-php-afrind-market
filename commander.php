<?php
session_start();
$page = "articles";
include_once "articles.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Vente en ligne - Commander</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
?>
<br>
<h3>Passer une commande</h3>
<?php
$idarticle = $_GET["idarticle"];
$articleModel = new ArticleModel();
$article = $articleModel->selectById($idarticle);
$userid = $_SESSION["userid"];
?>
<div class="row">
    <div class="col-4">
        <img src="<?= $article->img_link ?>" style="max-width:250px;height:250px" />
    </div>
    <div class="col-8">
        <?= $article->libelle ?> <br>
        <?= $article->prix ?> F CFA<br>
        <form method="POST" action="traiter_commande.php">
            Qte :  <br>
            <input type="number" name="qte" min="1" max="<?= $article->qte ?>">
            <input type="hidden" name="idarticle" value="<?= $article->id ?>" >
            <input type="hidden" name="iduser" value="<?= $userid ?>" ><br><br>
            <input type="submit" class="btn btn-success" value="Commander">
        </form>
    </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>