<?php
include("constant.php");

function dbConnect()
{

    try {
        return new PDO('pgsql:dbname=solde;host=' . DB_SERVER . ';port=' . DB_PORT, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return false;
    }
}

function dbGetInfo($db, $login)
{
    $request = "SELECT * FROM Utilisateur WHERE login='" . $login . "'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}

function dbCreateUser($db, $login, $passwd, $username, $name)
{

    $request = "INSERT INTO utilisateur(login, password, nom, prenom, solde) values('" . $login . "', '" . $passwd . "', '" . $name . "', '" . $username . "', 0)";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbAddMoney($db, $number, $id)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $request = "SELECT solde FROM Utilisateur WHERE login='" . $id . "'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $actual_money = $result[0]['solde'];
    $new_money = $actual_money + $number;
    $date =  date('d') . "/" . date('m') . "/" . date('Y') . " " . date('H') . ":" . date('i') . ":" . date('s');

    $request = "INSERT INTO solde(id_user, date, lastval, newval) values('" . $id . "', '" . $date . "', " . $actual_money . ", " . $new_money . ")";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $request = "UPDATE Utilisateur SET solde=" . $new_money . " WHERE login='" . $id . "'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetId($db, $user_log) {
    $request = "SELECT id FROM Utilisateur WHERE login='".$user_log."'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result[0]['id'];
}

function dbUpdateMoney($db, $id, $po, $user_log)
{

    $request = "UPDATE Solde SET newval=" . $po . " WHERE id=" . $id ;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $res = dbGetModif2($db, $user_log, $id);

    foreach ($res as $value) {
        $gain_money = $value['newval'] - $value['lastval'];
        dbSetLastMoney($db, $value['id'], $po);
        dbSetNewMoney($db, $value['id'], ($po+$gain_money));
        $po = ($po+$gain_money);
    }

    $request = "UPDATE Utilisateur SET solde=" . $po . " WHERE login=" . $user_log . "";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}

function dbSetLastMoney($db, $id, $po) {
    $request = "UPDATE Solde SET lastval=" . $po . " WHERE id=" . $id . "";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}

function dbSetNewMoney($db, $id, $po) {
    $request = "UPDATE Solde SET newval=" . $po . " WHERE id=" . $id . "";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetLastMoney($db, $id) {
    $request = "SELECT lastval FROM Solde WHERE id=".$id;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbGetNewMoney($db, $id) {
    $request = "SELECT newval FROM Solde WHERE id=".$id;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbGetModif2($db, $user_id, $id)
{

    $request = "SELECT * FROM Solde WHERE id_user='" . $user_id . "' AND id>".$id;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbGetModif($db, $id)
{

    $request = "SELECT * FROM Solde WHERE id_user='" . $id . "'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
