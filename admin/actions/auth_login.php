<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$login = Autenticacion::log_in($postData['usuario'], $postData['password']);

if ($login) {

    if ($login == "usuario") {
        header('location: ../../index.php?sec=catalogo_completo');
    } else {
        header('location: ../index.php?sec=dashboard');
    }
} else {
    header('location: ../../index.php?sec=login');
}
