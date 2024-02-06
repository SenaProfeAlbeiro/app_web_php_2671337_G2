# DROP DATABASE db_appwebphp;
-- -----------------------------------------------------
-- Estructura db_appwebphp
-- -----------------------------------------------------
CREATE DATABASE db_appwebphp DEFAULT CHARACTER SET utf8 ;
USE db_appwebphp;

-- -----------------------------------------------------
-- Tabla ROLES
-- -----------------------------------------------------
CREATE TABLE ROLES (
  rol_code INT(11) NOT NULL AUTO_INCREMENT,
  rol_name VARCHAR(45) NOT NULL,
  PRIMARY KEY (rol_code)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Usuarios
-- -----------------------------------------------------
CREATE TABLE USERS (
  rol_code INT(11) NOT NULL,
  user_code INT(11) NOT NULL,
  user_name VARCHAR(45) NOT NULL,
  user_lastname VARCHAR(45) NOT NULL,
  user_email VARCHAR(45) NOT NULL,
  user_pass VARCHAR(200) NOT NULL,
  user_status TINYINT(4) NOT NULL,
  PRIMARY KEY (user_code),
  INDEX ind_users_roles (rol_code ASC),
  CONSTRAINT fk_users_roles
    FOREIGN KEY (rol_code)
    REFERENCES ROLES (rol_code)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

INSERT INTO ROLES VALUES
(null, "admin");

SELECT * FROM ROLES;

INSERT INTO USERS VALUES
(1, 12345678,"Vicente","Fernández","vicente@correo.com", sha1("12345"),1);
SELECT * FROM USUARIOS;