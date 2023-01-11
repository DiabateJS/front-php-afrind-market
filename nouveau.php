<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel article</title>
</head>
<body>
<h3>Création article</h3>
<br>
<form method="POST" action="creation_article.php">
    Libelle : <input type="text" name="libelle" /><br>
    Prix : <input type="text" name="prix" /><br>
    Quantité : <input type="text" name="qte" /><br>
    Image : <input type="text" name="img_link" /><br>
    Commentaire : <br>
    <textarea></textarea><br>
    <input type="submit" value="Enregistrer" />
    <button>Nouveau</button>
</form>
<br>
<br>
<a href="index.php">Articles</a>
</body>
</html>