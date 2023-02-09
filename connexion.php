<?php
session_start();
include_once "users.model.php";
$userModel = new UsersModel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
        $_SESSION["profil"] = $res->data[0]["profil"];
        header('Location: index.php');
        exit();
    }else{
        $_SESSION["user"] = "";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>