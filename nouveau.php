<?php
$page = "article";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Nouvel article</title>
</head>
<body>
<div class="container">
<br>
<?php
include "entete.php";
?>
<br>
<h3>Création article</h3>
<br>
<form method="POST" action="creation_article.php">
    <div class="mb-3">
        <label for="libelle" class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" id="libelle">
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" name="prix" id="prix">
    </div>
    <div class="mb-3">
        <label for="qte" class="form-label">Quantité</label>
        <input type="text" class="form-control" name="qte" id="qte">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Image article</label>
        <input class="form-control" type="file" name="img_link" id="formFile">
    </div>
    <div class="mb-3">
        <label for="commentaire" class="form-label">Commentaire</label>
        <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button class="btn btn-success">Nouveau</button>
</form>
<br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>