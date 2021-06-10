CRATE DATABASE solde;
CREATE TABLE Utilisateur(
id serial PRIMARY KEY,
login varchar(50),
password varchar(250),
nom varchar(50),
prenom varchar(50)
solde INT
);
CREATE TABLE Solde(
id serial PRIMARY KEY,
id_user varchar(50),
date varchar(50),
lastval int,
newval INT
);