<?php session_start();
    require_once "models/User.php";
    class Users{
        public function __construct(){}        
        # Crear Usuario
        public function createUser(){
            if (isset($_SESSION['session'])) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/roles/admin/header.view.php";
                    require_once "views/modules/mod01_users/user_create.view.php";
                    require_once "views/roles/admin/footer.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Crear el Objeto
                    $user = new User(
                        $_POST['rolCode'],
                        $_POST['userCode'],
                        $_POST['userName'],
                        $_POST['userLastName'],
                        $_POST['userEmail'],
                        $_POST['userPass'],
                        $_POST['userStatus']                    
                    );
                    // Persistencia a la DB
                    $user->userCreate();
                    header("Location: ?c=Users&a=readUser");
                }
            } else {
                header("Location: ?c=Dashboard");
            }
        }
        # Listar Usuarios
        public function readUser(){            
            header("Location: ?c=Dashboard");
        }
        # Actualizar Usuario
        public function updateUser(){}
        # Eliminar Usuario
        public function deleteUser(){}
    }
?>