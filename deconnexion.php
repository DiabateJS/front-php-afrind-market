<?php
session_start();
$_SESSION["user"] = "";
$_SESSION["userid"] = "";
$_SESSION["email"] = "";
$_SESSION["profil"] = "";
header('Location: index.php');
?>