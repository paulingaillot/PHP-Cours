-------------------------------------------------------------------------------
--- Database cleanup ----------------------------------------------------------
-------------------------------------------------------------------------------
DROP TABLE IF EXISTS tweets CASCADE;

-------------------------------------------------------------------------------
--- Database creation ---------------------------------------------------------
-------------------------------------------------------------------------------
CREATE TABLE tweets
(
	id SERIAL PRIMARY KEY,
	text VARCHAR(80) NOT NULL,
	login VARCHAR(20) NOT NULL
);

-------------------------------------------------------------------------------
--- Populate databases --------------------------------------------------------
-------------------------------------------------------------------------------
INSERT INTO tweets(text, login) VALUES('Un tweet des CIR1 !!', 'cir1');
INSERT INTO tweets(text, login) VALUES('Un tweet des CIR2 !!', 'cir2');
INSERT INTO tweets(text, login) VALUES('Un tweet des CIR3 !!', 'cir3');
INSERT INTO tweets(text, login) VALUES('Un tweet des M1 !!', 'm1');
INSERT INTO tweets(text, login) VALUES('Un tweet des M2 !!', 'm2');

