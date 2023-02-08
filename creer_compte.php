<?php
include_once "user.model.php";
include_once "users.model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vente en ligne - Inscription</title>
</head>
<body>
<div class="container">
<?php
if (isset($_POST)){
    if ($_POST["operation"] == "enregistrer"){
        $email = $_POST["email"];
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $mdp1 = $_POST["mdp1"];
        $adresse = $_POST["adresse"];

        $user = new User(1,$login, $mdp, $email, $adresse);
        $userModel = new UsersModel();
        $isPwdConfirm = $mdp == $mdp1;
        if (!$isPwdConfirm){
            $msg_error = "Veuillez confirmer le mot de passe";
        }else{
            if ($email !== "" && $login !== "" && $mdp !== "" && $adresse != ""){
                $resultat = $userModel->create($user);
                $msg_error = $resultat->hasError == False ? "Utilisateur créer avec succes !" : "Erreur a la creation du user !";
            }else {
                $msg_error = "Veuillez renseigner tous les champs du formulaire";
            }
        }
    }
    if ($_POST["operation"] == "nouveau"){
        $_POST["email"] = "";
        $_POST["login"] = "";
        $_POST["mdp"] = "";
        $_POST["mdp1"] = "";
        $_POST["adresse"] = "";
    }
}
?>
<br>
<a href="index.php">Accueil</a> - <a href="connexion.php">Connexion</a>
<h3>Inscription</h3>
<br>
<form method="POST" action="creer_compte.php">
    <div class="mb-3">
        <?= $msg_error ?>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" id="login" required>
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="mdp" id="mdp" required>
    </div>
    <div class="mb-3">
        <label for="mdp1" class="form-label">Confirmer mot de passe</label>
        <input type="password" class="form-control" name="mdp1" id="mdp1" required>
    </div>
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" id="adresse" required>
    </div>
    <button type="submit" class="btn btn-primary" name="operation" value="enregistrer">Enregistrer</button>
    <button class="btn btn-success" name="operation" value="nouveau">Nouveau</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>