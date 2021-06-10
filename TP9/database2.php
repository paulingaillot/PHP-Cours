<?php

include("constant.php");

function dbConnect()
{

    try {
        return new PDO('pgsql:dbname=' . DB_NAME2 . ';host=' . DB_SERVER . ';port=' . DB_PORT, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return false;
    }
}

function dbGetVal($db, $act, $mois)
{

    $request = "SELECT valeur FROM statistique WHERE action='" . $act . "' AND mois='" . $mois . "'";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getMonth($val)
{

    switch ($val) {
        case 1:
            return "Jan";
            break;
        case 2:
            return "Fev";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Avr";
            break;
        case 5:
            return "Mai";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jui";
            break;
        case 8:
            return "Aou";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Oct";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Dec";
            break;


        default:
            # code...
            break;
    }
}
