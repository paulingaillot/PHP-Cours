
DELETE FROM citation;
DELETE FROM siecle;
DELETE FROM auteur;

-- --- Populate auteur table ------------
ALTER SEQUENCE auteur_id_seq RESTART;
INSERT INTO auteur (nom, prenom) VALUES
('de Montesquieu', 'Charles'),
('Hugo', 'Victor'),
('Marx', 'Karl'),
('Bernard', 'Tristan'),
('de La Fontaine', 'Jean');

-- --- Populate siecle table ------------
ALTER SEQUENCE siecle_id_seq RESTART;
INSERT INTO siecle (numero) VALUES
(17),
(18),
(19),
(20);

-- -- --- Populate citation table ------------
ALTER SEQUENCE citation_id_seq RESTART;
INSERT INTO citation (phrase, auteurid, siecleid) VALUES
('Ne sentirons-nous jamais que le ridicule des autres?', 1, 2),
('L''animal a cet avantage sur l''homme qu''il ne peut être sot.', 2, 3),
('L''homme est un loup pour l''homme ', 3, 3),
('Les hommes sont toujours sincères. Ils changent de sincérité, voilà tout.', 4, 4),
('L''histoire de l''humanité est l''histoire de la lutte des classes.', 3, 3),
('Rien ne sert de courir, il faut partir à point ', 5, 1);