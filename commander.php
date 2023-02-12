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
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<script src="bootstrap.min.js"></script>
</body>
</html>