<?php

include("constant.php");

function dbConnect() {

    try {
      return new PDO('pgsql:dbname='.DB_NAME.';host='.DB_SERVER.';port='.DB_PORT, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return false;
    }
    }

    function dbGetNotes($db, $etu, $sem) {

        $request = "SELECT note FROM notes WHERE etudiant='".$etu."' AND semestre='".$sem."'";
        $statement = $db->prepare($request);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
        
        }

        function dbGetMoyenne($db, $etu) {

            $request = "SELECT note FROM notes WHERE etudiant='".$etu."'";
            $statement = $db->prepare($request);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $moy = 0;
            $tot=0;
            foreach ($result as $value) {
                $moy= $moy +$value['note'];
                $tot++;
            }
            return ($moy/$tot);
            
            
            }


