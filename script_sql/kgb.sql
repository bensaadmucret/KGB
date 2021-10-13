
    CREATE DATABASE IF NOT EXISTS KGB;
    USE KGB;



    CREATE TABLE IF NOT EXISTS agent (
        id_agent INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        date_naissance DATE NOT NULL,
        code_identification VARCHAR(255) NOT NULL,
        nationalite VARCHAR(255) NOT NULL,
        specialite VARCHAR(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id_agent)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;




    CREATE TABLE IF NOT EXISTS cible (
        id_cible INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        date_naissance DATE NOT NULL,
        code_identification VARCHAR(255) NOT NULL,
        nationalite VARCHAR(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id_cible)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


    CREATE TABLE IF NOT EXISTS contact (
        id_contact INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        date_naissance DATE NOT NULL,
        code_identification VARCHAR(255) NOT NULL,
        nationalite VARCHAR(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id_contact)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



    CREATE TABLE IF NOT EXISTS planque (
        id_planque INT NOT NULL AUTO_INCREMENT,
        code VARCHAR(255) NOT NULL,
        adresse VARCHAR(255) NOT NULL,
        pays VARCHAR(255) NOT NULL,
        type_de_mission VARCHAR(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id_planque)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;





    CREATE TABLE IF NOT EXISTS mission (
        id_mission INT NOT NULL AUTO_INCREMENT,
        titre VARCHAR(255) NOT NULL,
        description_mission VARCHAR(255) NOT NULL,
        code_identification VARCHAR(255) NOT NULL,
        pays VARCHAR(255) NOT NULL,
        id_agent INT NOT NULL,
        id_contact INT NOT NULL,
        id_cible INT NOT NULL,
        type_de_mission VARCHAR(255) NOT NULL,
        statut VARCHAR(255) NOT NULL,
        id_planque INT NOT NULL,
        specialite_requise VARCHAR(255) NOT NULL,
        date_debut DATE NOT NULL,
        date_fin DATE NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id_mission)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.
# Sur une mission, la planque est obligatoirement dans le même pays que la mission.
# Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise. 


    CREATE TABLE IF NOT EXISTS mission_agent (
        id_mission INT NOT NULL,
        id_agent INT NOT NULL,
        PRIMARY KEY (id_mission, id_agent)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


    CREATE TABLE IF NOT EXISTS mission_contact (
        id_mission INT NOT NULL,
        id_contact INT NOT NULL,
        PRIMARY KEY (id_mission, id_contact)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


    CREATE TABLE IF NOT EXISTS mission_cible (
        id_mission INT NOT NULL,
        id_cible INT NOT NULL,
        PRIMARY KEY (id_mission, id_cible)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


    CREATE TABLE IF NOT EXISTS mission_planque (
        id_mission INT NOT NULL,
        id_planque INT NOT NULL,
        PRIMARY KEY (id_mission, id_planque)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



    CREATE TABLE IF NOT EXISTS mission_specialite (
        id_mission INT NOT NULL,
        id_specialite INT NOT NULL,
        PRIMARY KEY (id_mission, id_specialite)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;





    

# Les administrateurs ont un nom, un prénom, une adresse mail, un mot de passe, une date de création.

    CREATE TABLE IF NOT EXISTS administrateur (
        id_administrateur INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password_admin VARCHAR(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id_administrateur)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO administrateur (nom, prenom, email, password_admin) VALUES ('admin', 'admin', 'mohammed@itga.fr', 'admin');









