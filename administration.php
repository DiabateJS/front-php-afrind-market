<?php
session_start();
$page = "administration";
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
<br>
<?php
include_once "entete.php";
include_once "users.model.php";
include_once "profils.model.php";
include_once "commandes.model.php";
$userModel = new UsersModel();
$users = $userModel->getUsers();
$profilModel = new ProfilsModel();
$profils = $profilModel->getProfils();
$commandesModel = new CommandesModel();
$commandes = $commandesModel->getCommandes();
$commandes = $commandes->data;
?>
<div class="row">
    <div class="col-3">
        <ul>
            <li><a href="#" onclick="selectUserZone()">Utilisateurs</a></li>
            <li><a href="#" onclick="selectCommandeZone()">Commandes</a></li>
        </ul>
    </div>
    <div class="col-9">
        <div id="userZone">
            <h4>Gestion des utilisateurs</h4>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Profil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0 ; $i < count($users) ; $i++){
                    ?>
                        <tr>
                            <td><?= $users[$i]->nom ?></td>
                            <td><?= $users[$i]->prenom ?></td>
                            <td><?= $users[$i]->login ?></td>
                            <td><?= $users[$i]->email ?></td>
                            <td><?= $users[$i]->adresse ?></td>
                            <td><?= $users[$i]->telephone ?></td>
                            <td><?= $users[$i]->profil ?></td>
                        </tr>
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <h4>Gestion des profils utilisateurs</h4>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libelle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0 ; $i < count($profils) ; $i++){
                    ?>
                        <tr>
                            <td><?= $profils[$i]->id ?></td>
                            <td><?= $profils[$i]->libelle ?></td>
                        </tr>
                    <?php        
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="commandeZone">
            <h4>Supervision des commandes</h4>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Statut</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    for($i = 0 ; $i < count($commandes) ; $i++){
                ?>
                    <tr>
                        <td><?= $commandes[$i]["libelle"] ?></td>
                        <td><?= $commandes[$i]["statut"] ?></td>
                        <td><?= $commandes[$i]["nom"] ?></td>
                        <td><?= $commandes[$i]["prenom"] ?></td>
                        <td><?= $commandes[$i]["email"] ?></td>
                        <td><?= $commandes[$i]["adresse"] ?></td>
                        <td><?= $commandes[$i]["telephone"] ?></td>
                        <td><a class="btn btn-success" href="statut_commande.php?libelle=<?= $commandes[$i]["libelle"] ?>">Changer Statut</a></td>
                    </tr>
                <?php        
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script src="bootstrap.min.js"></script>
<script>
    selectUserZone();
    function selectUserZone(){
        document.getElementById("userZone").style.display = "block";
        document.getElementById("commandeZone").style.display = "none";
    }
    function selectCommandeZone(){
        document.getElementById("userZone").style.display = "none";
        document.getElementById("commandeZone").style.display = "block";
    }
</script>
</body>
</html>