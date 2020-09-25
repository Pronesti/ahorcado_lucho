<?php
session_start();
$_SESSION = array();
$_SESSION['palabra'] = $_POST['palabra'];
$_SESSION['intentos'] = $_POST['intentos'];
$_SESSION['letras'] = array();
header("Location: jugar.php");
die();
?>