<?php
require_once 'functions/autoload.php';

if (($_GET['sec'] ?? '') === 'logout') {
    Autenticacion::log_out();
    header('location: index.php?sec=home');
    exit;
}

// Procesamos el login ANTES de renderizar nada,
// para poder redirigir sin el error "headers already sent".
if (($_GET['sec'] ?? '') === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario  = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        Alerta::add_alerta('warning', 'Completá usuario y contraseña.');
    } else {

        $rol = Autenticacion::log_in($usuario, $password);

        if ($rol !== FALSE && $rol !== NULL) {
            header('location: index.php?sec=home');
            exit;
        }
    }
}

$vista = Vista::validar_vista($_GET['sec'] ?? 'home');

$userData = $_SESSION['loggedIn'] ?? null;

$nivel = (int) ($vista->getRestringida() ?? 0);

if (!isset($_SESSION['loggedIn'])) {
    if ($nivel > 0) {
        header('location: index.php?sec=login');
        exit;
    }
} else {
    Autenticacion::verify($nivel);
}

// variables globales que vas a necesitar en layout
$estados = Animo::listado_completo(); // o como lo tengas
$menu = Actor::listado_completo();

require_once "views/layout.php";