<?php
session_start();
$_SESSION["user"] = "";
$_SESSION["userid"] = "";
header('Location: index.php');
?>