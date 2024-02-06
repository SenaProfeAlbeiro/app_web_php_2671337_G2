<?php session_start();
    class Dashboard{
        public function __construct(){}
        public function main(){            
            if (isset($_SESSION['session'])) {
                $session = $_SESSION['session'];
                require_once "views/roles/" . $session . "/header.view.php";
                require_once "views/roles/" . $session . "/" . $session . ".view.php";
                require_once "views/roles/" . $session . "/footer.view.php";
            } else {
                header("Location:?");
            }
        }
    }
?>