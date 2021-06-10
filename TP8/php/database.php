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

function dbGetAuthorsNames($db) {

$request = 'SELECT nom, prenom FROM auteur';
$statement = $db->prepare($request);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;


}

function dbGetQuotes($db) {

    $request = 'SELECT * FROM citation';
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function dbGetCenturies($db) {

    $request = 'SELECT numero FROM siecle';
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

   // getNumberofQuotes(...)
   function getNumberofQuotes($db)
   {
       try
       {
         $statement = $db->query('SELECT count(id) FROM citation');
         $result1 = $statement->fetch(PDO::FETCH_ASSOC);
         $result2 = $result1['count'];
       }
       catch (PDOException $exception)
       {
         error_log('Request error: '.$exception->getMessage());
         return false;
       }
       return $result2;
   }

   function getQuotesByAuthor($db, $author, $century) {

    $request = "SELECT * FROM citation, auteur, siecle WHERE siecle.id=citation.siecleid AND auteur.id=citation.auteurid AND auteur.nom='".$author."' AND siecle.numero=".$century;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
   }

   function dbInsertQuote($db, $nom, $prenom, $siecle, $citation) {

    // Verification Siecle soit int
  
    if(!is_numeric($siecle) ||strlen($nom) < 1 ||strlen($prenom) <1 || strlen($citation)<1) {
      return 1;
    }
    $siecle = (int)$siecle;


    // Creation de l'USER si necessaire

    $request = "SELECT COUNT(*) FROM auteur WHERE nom='".$nom."' AND prenom='".$prenom."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $var = $result[0]['count'];

    if($var ==0 ) {
      $request = "INSERT into auteur (nom, prenom) values ('".$nom."','".$prenom."');";
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Creation du siecle si necessaire

    $request = "SELECT COUNT(*) FROM siecle WHERE numero=".$siecle."";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $var = $result[0]['count'];

    if($var ==0 ) {
      $request = "INSERT into siecle (numero) values (".$siecle.");";
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Verification de l'existence de la quote

    $request = "SELECT COUNT(*) FROM citation, auteur, siecle WHERE citation.auteurid = auteur.id AND citation.siecleid = siecle.id AND phrase='".$citation."' AND siecle.numero=".$siecle." AND auteur.nom='".$nom."' AND auteur.prenom='".$prenom."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $var = $result[0]['count'];

    // On recupere AuteurId et SiecleId

    $request = "SELECT id FROM siecle WHERE numero=".$siecle."";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $siecleid = $result[0]['id'];

    $request = "SELECT id FROM auteur WHERE nom='".$nom."' AND prenom='".$prenom."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $auteurid = $result[0]['id'];

    // on créé la citation

    if($var ==0 ) {
      $request = "INSERT into citation (phrase, auteurid, siecleid) values ('".$citation."', ".$auteurid.", ".$siecleid.");";
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    return $result;

   }

   function dbDelQuote($db, $quote) {
 
    // On verif que la citation existe

    $request = "SELECT COUNT(*) FROM citation WHERE id=".$quote."";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $var = $result[0]['count'];

    if($var ==0 ) {
      return 0;
    }
    
    // On recuperer auteur id et siecle id

    $request = "SELECT siecle.id as siecleid, auteur.id as auteurid FROM citation, auteur, siecle WHERE siecle.id=citation.siecleid AND auteur.id=citation.auteurid AND citation.id=".$quote;
    $statement = $db->prepare($request);
    $statement->execute();
    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);

    // On verif si il existe d'autre citation du meme auteur

    $request = "SELECT COUNT(*) FROM auteur WHERE id=".$result1[0]['auteurid']."";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $varauteur = $result[0]['count'];

    // On verif qu'il existe d'autre citation du meme siecle

    $request = "SELECT COUNT(*) FROM siecle WHERE id=".$result1[0]['siecleid'];
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $varsiecle = $result[0]['count'];


    // On suppr la citation

    $request = "DELETE FROM citation WHERE id=".$quote;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // On suppr l'auteur et le siecle si il sotn vide

    if($varsiecle == 1 ) {
      $request = "DELETE FROM siecle WHERE id=".$result1[0]['siecleid'];
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    if($varauteur == 1 ) {
      $request = "DELETE FROM auteur WHERE id=".$result1[0]['auteurid'];
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

   }

   function alea($db) {

    $statement = $db->query('SELECT count(id) FROM citation');
    $result1 = $statement->fetch(PDO::FETCH_ASSOC);
    $result2 = $result1['count'];
    $test=rand(0,$result2-1);
    $db=dbConnect();
    $auteur = dbGetAuthorsNames($db);
    $quote = dbGetQuotes($db);
    $centurie = dbGetCenturies($db);

    $autoid=$quote[$test]["auteurid"];
    $sid=$quote[$test]["siecleid"];

    $var="<B>".$quote[$test]["phrase"]."</B>"."<br>".$auteur[$autoid-1]["nom"]." ".$auteur[$autoid-1]["prenom"]." (".$centurie[$sid-1]["numero"]."eme siècle)";
    return $var;
   }

?>