CREATE DATABASE dbMVC;
USE dbMVC;

DROP TABLE Type;
DROP TABLE Emplacement;

CREATE TABLE Type (
    idType INT,
    nomType VARCHAR(100),
    PRIMARY KEY (idType)
);

CREATE TABLE Emplacement (
    idEmpl INT,
    idType INT,
    adresseEmpl VARCHAR(100),
    anneeConstruction INT,
    PRIMARY KEY (idEmpl),
    FOREIGN KEY (idType) REFERENCES Type(idType)
);



