CREATE DATABASE Corsi_Formazione;


CREATE TABLE Sede (
    ID_Sede INT NOT NULL AUTO_INCREMENT,
    Provincia CHAR(2) NOT NULL,
    Comune VARCHAR(30) NOT NULL,
    Via VARCHAR(30) NOT NULL,
    N_Civico VARCHAR(10) NOT NULL,
    CAP CHAR(5) NOT NULL,
    PRIMARY KEY (ID_Sede)
);



CREATE TABLE Dipendente(
    ID_Dipendente INT NOT NULL AUTO_INCREMENT,
    ID_Sede INT NOT NULL,
    Nome VARCHAR(30) NOT NULL,
    Cognome VARCHAR(30) NOT NULL,
    CF CHAR(16) NOT NULL UNIQUE,
    Data_Di_Nascita DATE NOT NULL,
    Telefono CHAR(10) NOT NULL UNIQUE,
    Email VARCHAR(30) NOT NULL UNIQUE,
    Password VARCHAR(32) NOT NULL,
    PRIMARY KEY (ID_Dipendente),
    FOREIGN KEY (ID_Sede) REFERENCES Sede(ID_Sede)
);



CREATE TABLE Corso(
    ID_Corso INT NOT NULL AUTO_INCREMENT,
    ID_Sede INT NOT NULL,
    Nome VARCHAR(30) NOT NULL,
    Data_Inizio DATE NOT NULL,
    Data_Fine DATE NOT NULL,
    Iscritti INT NOT NULL DEFAULT 0,
    Limite_Iscritti INT NOT NULL,
    PRIMARY KEY (ID_Corso),
    FOREIGN KEY (ID_Sede) REFERENCES Sede(ID_Sede),
    CHECK (Data_Inizio < Data_Fine),
    CHECK (Limite_Iscritti > 0),
    CHECK (Iscritti >= 0 AND Iscritti <= Limite_Iscritti)
);




CREATE TABLE Partecipazioni_Corsi(
    ID_Dipendente INT NOT NULL,
    ID_Corso INT NOT NULL,
    PRIMARY KEY (ID_Dipendente, ID_Corso),
    FOREIGN KEY (ID_Dipendente) REFERENCES Dipendente(ID_Dipendente),
    FOREIGN KEY (ID_Corso) REFERENCES Corso(ID_Corso)
);



