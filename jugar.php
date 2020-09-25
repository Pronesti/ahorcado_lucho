<?php
include_once("Ahorcado.php");
include_once("TemplateEngine.php");
session_start();

if (!empty($_GET['letra'])) {
    $_SESSION['letras'][] = $_GET['letra'];
}

$ahorcado = new Ahorcado($_SESSION['palabra'], $_SESSION['intentos']);

foreach ($_SESSION['letras'] as $letra) {

    $ahorcado->jugar($letra);
}
$mostrar = $ahorcado->mostrar();
$intentos = $ahorcado->intentosRestantes();
$te = new TemplateEngine("jugar.html");
$te->addVariable("mostrarPalabra", $mostrar);
$te->addVariable("intentos", $intentos);

echo $te->render();

if ($ahorcado->perdio() == true) {
    $_SESSION = array();
    session_destroy();
    header("Location: perdiste.php");
    die();
}
if ($ahorcado->gano() == true) {
    $_SESSION = array();
    session_destroy();
    header("Location: ganaste.php");
    die();
}
