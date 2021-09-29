
    CREATE DATABASE IF NOT EXISTS KGB;
    USE KGB;


    CREATE TABLE agents (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        prenom TEXT NOT NULL,
        date_naissance TEXT NOT NULL,
        code_identification TEXT NOT NULL,
        nationalite TEXT NOT NULL,
        specialite TEXT NOT NULL
    );



    CREATE TABLE cibles (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        prenom TEXT NOT NULL,
        date_naissance TEXT NOT NULL,
        code_identification TEXT NOT NULL,
        nationalite TEXT NOT NULL
    );




    CREATE TABLE contacts (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        prenom TEXT NOT NULL,
        date_naissance TEXT NOT NULL,
        code_identification TEXT NOT NULL,
        nationalite TEXT NOT NULL
    );

    CREATE TABLE planques (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        code TEXT NOT NULL,
        adresse TEXT NOT NULL,
        pays TEXT NOT NULL,
        type TEXT NOT NULL
    );



    CREATE TABLE missions (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        titre TEXT NOT NULL,
        description TEXT NOT NULL,
        code_identification TEXT NOT NULL,
        pays TEXT NOT NULL,
        agent_id INTEGER NOT NULL,
        contact_id INTEGER NOT NULL,
        cible_id INTEGER NOT NULL,
        type TEXT NOT NULL,
        statut TEXT NOT NULL,
        planque_id INTEGER NOT NULL,
        specialite TEXT NOT NULL,
        date_debut TEXT NOT NULL,
        date_fin TEXT NOT NULL
    );




    CREATE TABLE administrateurs (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        prenom TEXT NOT NULL,
        mail TEXT NOT NULL,
        mdp TEXT NOT NULL,
        date_creation TEXT NOT NULL
    );

