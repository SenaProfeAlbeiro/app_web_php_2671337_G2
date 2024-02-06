<?php session_start();
class Logout{
    public function __construct(){}
    # Iniciar sesión
    public function main(){
        session_destroy();
        header("Location:?");
    }
}
