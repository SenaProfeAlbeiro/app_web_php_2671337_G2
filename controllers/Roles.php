<?php session_start();
    require_once "models/Rol.php";
    class Roles{
        public function main(){
            header("Location:?c=Dashboard");
        }
        // Registrar Rol
        public function createRol(){
            $rol = $_SESSION['rol'];
            if (isset($_SESSION['session']) && ($rol == 1 || $rol == 3)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/roles/admin/header.view.php";
                    require_once "views/modules/mod01_users/rol_create.view.php";
                    require_once "views/roles/admin/footer.view.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $rol = new Rol(
                        null,
                        $_POST['rolName']
                    );
                    // Programar una función que capture el último registro de la tabla y le su me 1
                    $rol->rolCreate();
                    header("Location:?c=Roles&a=readRol");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        // Consultar roles
        public function readRol(){
            $roles = new Rol;
            $roles = $roles->rolRead();
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/mod01_users/rol_read.view.php";
            require_once "views/roles/admin/footer.view.php";            
        }
        // Actualizar Rol
        public function updateRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // 1ra Parte: Obtener el registro
                $rol = new Rol;
                $rol = $rol->getRolById($_GET['idRol']);
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/mod01_users/rol_update.view.php";                
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // 2da Parte: Actualizar el registro
                $rol = new Rol(
                    $_POST['rolCode'],
                    $_POST['rolName']
                );
                print_r($rol);
                $rol->rolUpdate();
                header("Location:?c=Roles&a=readRol");
            }
        }
        // Eliminar Rol
        public function deleteRol(){
            $rol = new Rol;                        
            $rol = $rol->rolDelete($_GET['idRol']); 
            // Esto no es correcto, malas prácticas!!!
            // echo "<script>
            //         alert('Usuario Eliminado');
            //       </script>";
            header("Location:?c=Roles&a=readRol");
        }

    }
?>
