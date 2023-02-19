<?php
session_start();
$page = "administration";
include_once "user.model.php";
include_once "users.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Administration</title>
</head>
<body>
<div class="container">
<?php
    include_once "entete.php";
    $usersModel = new UsersModel();
    if (isset($_POST) && isset($_POST["nom_user"])){
        $nom = $_POST["nom_user"];
        $prenom = $_POST["prenom_user"];
        $email = $_POST["email_user"];
        $login = $_POST["login_user"];
        $pwd = $_POST["password_user"];
        $adresse = $_POST["adresse_user"];
        $tel = $_POST["telephone_user"];
        $profil = $_POST["profil_user"];
        $user = new User(0, $login, $pwd, $nom, $prenom, $email, $adresse, $tel, $profil);
        $resultat = $usersModel->create($user);
        if ($resultat->hasError == False){
        ?>
            <h5>Utilisateur crée avec succès !</h5>
        <?php    
        }
    }
?>
</div>
<script src="bootstrap.min.js"></script>
</body>
</html>