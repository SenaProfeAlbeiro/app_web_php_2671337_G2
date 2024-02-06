<?php session_start();
require_once "models/User.php";
class Login{    
    public function __construct(){}
    # Iniciar sesión
    public function main(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $message = "";
            require_once "views/company/header.view.php";
            require_once "views/company/login.view.php";
            require_once "views/company/footer.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Crea el objeto
            $user = new User(
                $_POST['email'],
                $_POST['pass']
            );
            // Persistencia a la DB
            $user = $user->login();
            // Validación
            if ($user) {
                $status = $user->getUserStatus();
                $rol = $user->getRolCode();
                if ($status == 1) {
                    if ($rol == 1) {
                        $_SESSION['session'] = "admin";                        
                        $_SESSION['rol'] = $rol;                        
                    } elseif ($rol == 2) {
                        $_SESSION['session'] = "customer";
                    } elseif ($rol == 3) {
                        $_SESSION['session'] = "seller";
                    }
                    header("Location: ?c=Dashboard");
                } else {
                    $message = "El usuario no está activo en el sistema";
                    require_once "views/company/header.view.php";
                    require_once "views/company/login.view.php";
                    require_once "views/company/footer.view.php";
                }
                                
            } else {
                $message = "El usuario no existe";
                require_once "views/company/header.view.php";
                require_once "views/company/login.view.php";
                require_once "views/company/footer.view.php";
            }
        }
    }    
}
