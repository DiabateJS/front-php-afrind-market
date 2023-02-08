<?php
session_start();
$_SESSION["user"] = "";
$_SESSION["userid"] = "";
$_SESSION["email"] = "";
header('Location: index.php');
?>