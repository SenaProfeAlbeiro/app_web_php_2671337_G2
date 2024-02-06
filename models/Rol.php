<?php
    class Rol{
        // ****** 1er Parte: Clase (POO) *************** //
        // Atributos: Encapsulamiento
        private $dbh;
        private $rolCode;
        private $rolName;
        // Métodos
        # Sobrecarga de Constructores
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }
        public function __construct2($rolCode, $rolName){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
        }
        // Métodos set() y get()        
        # rolCode: set()
        public function setRolCode($rolCode){
            $this->rolCode = $rolCode;
        }
        # rolCode: get()
        public function getRolCode(){
            return $this->rolCode;
        }        
        # rolName: set()
        public function setRolName($rolName){
            $this->rolName = $rolName;
        }
        # rolName: get()
        public function getRolName(){
            return $this->rolName;
        }
        // ****** 2da Parte: Persistencia DB (CRUD) ****** //

        # CU09 - Registrar Rol
        public function rolCreate(){
            try {
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # Requisito funcional
        // crear una función que autoincremente

        
        # CUXX - Consultar Roles
        public function rolRead(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);                
                foreach ($stmt->fetchAll() as $rol) {
                    $rolList[] = new Rol(
                        $rol['rol_code'],
                        $rol['rol_name']
                    );
                }                
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Obtener el Rol por Id
        public function getRolById($rolCode){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_code=:rolCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();                
                $rolDb = $stmt->fetch();                
                $rol = new Rol(
                    $rolDb['rol_code'],
                    $rolDb['rol_name']
                );                
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Actualizar Rol
        public function rolUpdate(){
            try {                
                $sql = 'UPDATE ROLES SET
                            rol_code = :rolCode,
                            rol_name = :rolName
                        WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Eliminar Rol
        public function rolDelete($rolCode){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }
    }    
?>