<?PHP

class Autenticacion
{


    /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $usuario El nombre de usuario provisto
     * @param string $password El password provisto
     * @return mixed Devuelve el rol en caso que las credenciales sean correctas, FALSE en caso de que no lo sean y Null en caso que el usuario no se encuentre en la BDD
     */
    public static function log_in(string $usuario, string $password)
    {
        $datosUsuario = Usuario::usuario_x_username($usuario);

        if ($datosUsuario) {
            // SE ENCONTRÓ EL USUARIO EN LA BASE DE DATOS, PROCEDEMOS A LOGUEAR";
            if (password_verify($password, $datosUsuario->getPassword())) {
                //LA CONTRASEÑA ES CORRECTA

                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();

                $_SESSION['loggedIn'] = $datosLogin;

                return $datosLogin['rol'];
            } else {
                //LA CONTRASEÑA NO ES CORRECTA
                Alerta::add_alerta('danger', "La contraseña ingresada no es correcta.");
                return FALSE;
            }
        } else {
            //NO SE ENCONTRÓ EL USUARIO EN LA BASE DE DATOS
            Alerta::add_alerta('warning', "El usuario ingresado no se encontró en la base de datos.");
            return NULL;
        }
    }


    /*LOG OUT */
    public static function log_out()
    {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }


    /* VERIFICAR CREDENCIALES*/
   public static function verify(int $nivel = 0): bool
{
    if ($nivel === 0) {
        return true;
    }

    if (!isset($_SESSION['loggedIn'])) {
        header("Location: index.php?sec=login");
        exit;
    }

    $rol = $_SESSION['loggedIn']['rol'];

    // SOLO bloquear admin si corresponde nivel 2
    if ($nivel == 2 && $rol !== "superadmin") {
        Alerta::add_alerta("danger", "No tenés permisos para esta sección.");
        header("Location: index.php?sec=403");
        exit;
    }

    return true;
}
}
