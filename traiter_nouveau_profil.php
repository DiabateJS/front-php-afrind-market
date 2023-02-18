<?php
session_start();
$page = "administration";
include_once "profil.model.php";
include_once "profils.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Administration</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
$profilsModel = new ProfilsModel();
if (isset($_POST["libelle_profil"])){
    $libelle_profil = $_POST["libelle_profil"];
    $profil = new Profil(0, $libelle_profil);
    $resultat = $profilsModel->create($profil);
    if ($resultat->hasError == False){
    ?>
    <h5>Profil créer avec succès !</h5>
    <?php    
    }
}
if (isset($_GET) && $_GET["operation"] == "delete" && $_GET["id"] !== ""){
$idProfil = $_GET["id"];
$resultat = $profilsModel->delete($idProfil);
if ($resultat->hasError == False){
?>
<h5>Profil supprimé avec succès !</h5>
<?php
}
}
?>
</div>
<script src="bootstrap.js"></script>  
</body>
</html>