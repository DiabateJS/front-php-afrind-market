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
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<script src="bootstrap.min.js"></script>
</body>
</html>
