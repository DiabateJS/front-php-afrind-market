<?php
session_start();
$page = "articles";
include_once "users.model.php";
$userModel = new UsersModel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Profil</title>
</head>
<body>
<div class="container">
<?php
include_once "entete.php";
?>
<br>
<h3>Profil</h3><br>
<?php
$userId = $_GET["id"];
$user = $userModel->selectById($userId)[0];
?>
Nom : <?= $user["nom"] ?><br>
Prenom : <?= $user["prenom"] ?><br>
Login : <?= $user["login"] ?><br>
Email : <?= $user["email"] ?><br>
Adresse : <?= $user["adresse"] ?><br>
<?php
if (isset($_SESSION["profil"]) && $_SESSION["profil"] == "admin"){
?>
Profil : <?= $user["profil"] ?>
<?php    
}
?>
<br>
</div>
<script src="bootstrap.js"></script>
</body>
</html>