<?php
session_start();
$page = "contact";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Vente en ligne</title>
</head>
<body>
<div class="container">
    <br>
    <?php
        include "entete.php";
    ?>
    <br>
    <br>
    <h1>Contacts</h1> 
    <a href="tel:+225142056204">
        (+225) 0142056204
        <img src="images/icon_whatup.png" style="width: 20px; height: 20px">
    </a><br>
    <a href="tel:+225544862501">
        (+225) 0544862501
        <img src="images/icon_whatup.png" style="width: 20px; height: 20px">
    </a><br>
    <a href="tel:+225757227777">
        (+225) 0757227777
        <img src="images/icon_whatup.png" style="width: 20px; height: 20px">
    </a>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
