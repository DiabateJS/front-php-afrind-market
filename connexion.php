<?php
session_start();
include_once "users.model.php";
$userModel = new UsersModel();
$msg_error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Vente en ligne - Connexion</title>
</head>
<?php
if (isset($_POST["login"]) && isset($_POST["pwd"])){
    $login = $_POST["login"];
    $pwd = $_POST["pwd"];
    $res = $userModel->isAuth($login, $pwd);
    $isAuth = $res->hasError == False && count($res->data) == 1;
    if ($isAuth){
        $_SESSION["user"] = $login;
        $_SESSION["userid"] = $res->data[0]["id"];
        $_SESSION["email"] = $res->data[0]["email"];
        $_SESSION["nom"] = $res->data[0]["nom"];
        $_SESSION["prenom"] = $res->data[0]["prenom"];
        $_SESSION["profil"] = $res->data[0]["profil"];
        header('Location: index.php');
        exit();
    }else{
        $_SESSION["user"] = "";
        $_SESSION["nom"] = "";
        $_SESSION["prenom"] = "";
        $_SESSION["userid"] = "";
        $_SESSION["email"] = "";
        $_SESSION["profil"] = "";
        $msg_error = "Login ou Mot de passe incorrecte !";
    }
}
?>
<body>
    <div class="container">
        <div id="form-container">
            <img src="images/afrind_market.jpeg" width="100px" height="100px" style="margin-bottom:15px;">
            <form action="connexion.php" method="POST">
                <span id="msg_error" class="text-danger"><?= $msg_error ?></span>
                <input type="text" name="login" id="login" placeholder="Login" class="field" value="<?= isset($_POST["login"]) ? $_POST["login"] : ""  ?>"><br>
                <input type="password" name="pwd" id="pwd" placeholder="Mot de passe" class="field" value=""><br>
                <input type="submit" class="btn btn-primary" value="Connecter">
                <a href="creer_compte.php" class="btn btn-success">Creer Compte</a>
            </form>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
</body>
</html>