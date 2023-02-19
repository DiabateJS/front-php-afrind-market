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
            <div id="showUsers">
                <br>
                <button class="btn btn-success" onclick="showNewUser()">Nouveau</button><br>
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
            </div>
            <div id="newUser">
                <h5>Création Utilisateur</h5>
                <br>
                <form action="traiter_nouveau_user.php" method="POST">
                    <div class="mb-3">
                        <label for="nom_user" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom_user" id="nom_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom_user" class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="prenom_user" id="prenom_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_user" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email_user" id="email_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="login_user" class="form-label">Login</label>
                        <input type="text" class="form-control" name="login_user" id="login_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_user" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password_user" id="password_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="adresse_user" class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="adresse_user" id="adresse_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone_user" class="form-label">Telephone</label>
                        <input type="text" class="form-control" name="telephone_user" id="telephone_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="profil_user" class="form-label">Profil</label>
                        <select class="form-control" name="profil_user" id="profil_user" required>
                            <?php
                                for ($i = 0 ; $i < count($profils) ; $i++){
                            ?>
                                <option value="<?= $profils[$i]->libelle ?>"><?= strtoupper($profils[$i]->libelle) ?></option>
                            <?php
                                }
                            ?>    
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success" value="Créer">
                </form>
            </div>
            <br>
            <h4>Gestion des profils utilisateurs</h4>
            <br>
            <div id="showProfils">
                <button class="btn btn-success" onclick="showNewProfil()">Créer Profil</button>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Libelle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i = 0 ; $i < count($profils) ; $i++){
                        ?>
                            <tr>
                                <td><?= $profils[$i]->id ?></td>
                                <td><?= $profils[$i]->libelle ?></td>
                                <td>
                                    <button class="btn btn-warning">Modifier</button>
                                    <a href="traiter_nouveau_profil.php?operation=delete&id=<?= $profils[$i]->id ?>" class="btn btn-danger">Supprimer</button>
                                </td>
                            </tr>
                        <?php        
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="newProfil">
                <form action="traiter_nouveau_profil.php" method="POST">
                    <div class="mb-3">
                        <label for="libelle_profil" class="form-label">Libellé Profil</label>
                        <input type="text" class="form-control" name="libelle_profil" id="libelle_profil" required>
                    </div>
                    <input type="submit" class="btn btn-success" value="Créer">
                </form>
            </div>
        </div>
        <div id="commandeZone">
            <h4>Supervision des commandes</h4>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Montant</th>
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
                        <td><?= $commandes[$i]["montant"] ?></td>
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
        document.getElementById("newProfil").style.display = "none";
        document.getElementById("newUser").style.display = "none";
        document.getElementById("commandeZone").style.display = "none";
    }
    function selectCommandeZone(){
        document.getElementById("userZone").style.display = "none";
        document.getElementById("commandeZone").style.display = "block";
    }
    function showNewProfil(){
        document.getElementById("showProfils").style.display = "none";
        document.getElementById("newProfil").style.display = "block";
    }
    function showNewUser(){
        document.getElementById("showUsers").style.display = "none";
        document.getElementById("newUser").style.display = "block";
    }
</script>
</body>
</html>