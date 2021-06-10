**Ne sachant pas ce qui etait demandé dans le fichier SQL je vous ai transmit la liste des commandes necassaire a sa creation dans celui ci.**


*Commandes tapées :*
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