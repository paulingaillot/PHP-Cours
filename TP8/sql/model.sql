
DROP TABLE IF EXISTS auteur CASCADE;
DROP TABLE IF EXISTS siecle CASCADE;
DROP TABLE IF EXISTS citation CASCADE;

-- Table auteur
CREATE TABLE auteur (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(64) NOT NULL,
  prenom VARCHAR(64) NOT NULL
);

-- Table siecle
CREATE TABLE siecle (
        id SERIAL PRIMARY KEY,
        numero INTEGER
);

-- Table citation
CREATE TABLE citation (
  id SERIAL PRIMARY KEY,
  phrase VARCHAR(255) NOT NULL,
  auteurid INTEGER,
  siecleid INTEGER,
  FOREIGN KEY(auteurid) REFERENCES auteur(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY(siecleid) REFERENCES siecle(id)
    ON UPDATE CASCADE ON DELETE CASCADE
);
--