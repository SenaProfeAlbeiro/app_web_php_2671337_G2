<?php
    class User{
        private $dbh;
        protected $rolCode;
        protected $rolName;
        protected $userCode;
        protected $userName;
        protected $userLastName;
        protected $userEmail;
        protected $userPass;
        protected $userStatus;
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
        public function __construct2($userEmail,$userPass){            
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;            
        }
        public function __construct7($rolCode, $userCode, $userName, $userLastName, $userEmail, $userPass, $userStatus){
            $this->rolCode = $rolCode;
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;
            $this->userStatus = $userStatus;
        }
        public function __construct8($rolCode,$rolName,$userCode,$userName,$userLastName,$userEmail,$userPass,$userStatus){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;            
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;
            $this->userStatus = $userStatus;
        }        
        public function setRolCode($rolCode){
            $this->rolCode = $rolCode;
        }
        public function getRolCode(){
            return $this->rolCode;
        }        
        public function setRolName($rolName){
            $this->rolName = $rolName;
        }
        public function getRolName(){
            return $this->rolName;
        }
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        }
        public function getUserCode(){
            return $this->userCode;
        }
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function getUserName(){
            return $this->userName;
        }
        public function setUserLastName($userLastName){
            $this->userLastName = $userLastName;
        }
        public function getUserLastName(){
            return $this->userLastName;
        }
        public function setUserEmail($userEmail){
            $this->userEmail = $userEmail;
        }
        public function getUserEmail(){
            return $this->userEmail;
        }
        public function setUserPass($userPass){
            $this->userPass = $userPass;
        }
        public function getUserPass(){
            return $this->userPass;
        }
        public function setUserStatus($userStatus){
            $this->userStatus = $userStatus;
        }
        public function getUserStatus(){
            return $this->userStatus;
        }
    // 2da parte persitencia
        # CU01 - Iniciar Sesión --> Funcionalidad 11
        public function login(){
            $sql = 'SELECT * FROM USERS                         
                    WHERE user_email = :user_email AND user_pass = :user_pass';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('user_email', $this->getUserEmail());
            $stmt->bindValue('user_pass', sha1($this->getUserPass()));
            $stmt->execute();
            $userDb = $stmt->fetch();
            if ($userDb) {
                $user = new User(
                    $userDb['rol_code'],
                    $userDb['user_code'],
                    $userDb['user_name'],
                    $userDb['user_lastname'],
                    $userDb['user_email'],
                    $userDb['user_pass'],                    
                    $userDb['user_status']
                );
                return $user;
            } else {
                return false;
            }
        }
        # CUXX - Crear Usuario
        public function userCreate(){
            try {
                $sql = 'INSERT INTO USERS VALUES (
                    :rolCode,
                    :userCode,
                    :userName,
                    :userLastName,
                    :userEmail,
                    :userPass,
                    :userStatus
                )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode', $this->getUserCode());                
                $stmt->bindValue('userName', $this->getUserName());                
                $stmt->bindValue('userLastName', $this->getUserLastName());                
                $stmt->bindValue('userEmail', $this->getUserEmail());                
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->bindValue('userStatus', $this->getUserStatus());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>