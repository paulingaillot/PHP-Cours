<?php

include("constant.php");

function dbConnect() {

    try {
      return new PDO('pgsql:dbname=etudiants;host='.DB_SERVER.';port='.DB_PORT, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return false;
    }
    }

function dbCreateUser($db, $login, $passwd, $mail, $username, $name) {

    $request = "INSERT INTO Utilisateur(login, password, mail, nom, prenom) values('".$login."', '".$passwd."', '".$mail."', '".$name."', '".$username."')";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbGetInfo($db, $login) {
    $request = "SELECT * FROM Utilisateur WHERE login='".$login."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];

}

function dbCreateStudent($db, $user_id, $nom, $prenom,$note) {

    $request = "INSERT INTO Etudiant(user_id, nom, prenom, note) values('".$user_id."', '".$nom."', '".$prenom."', ".$note.")";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbModifyStudent($db, $user_id, $nom, $prenom,$note) {

    $request = "UPDATE Etudiant SET note=".$note." WHERE nom='".$nom."' AND prenom='".$prenom."' AND user_id='".$user_id."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function dbDeleteStudent($db, $user_id, $nom, $prenom){

    $request = "DELETE FROM Etudiant WHERE nom='".$nom."' AND prenom='".$prenom."' AND user_id='".$user_id."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function dbGetAllStudents($db, $user) {
    $request = "SELECT * FROM Etudiant WHERE user_id='".$user."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

    ?>