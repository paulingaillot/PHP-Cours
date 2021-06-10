<?php
require_once('./database.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$db = dbConnect();

function view_ident() {
    $db = dbConnect();
    $res = dbGetInfo($db, $_SESSION['user_id']);

    return $res;
}

function update($db) {
    $id_trans= $_GET["id"];
    $po = $_POST["numberpo"];
    dbUpdateMoney($db, $id_trans, $po, $_SESSION['user_id']);

    header("Location: ./solde.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}

function addmoney($db) {
    $number = $_POST['add'];
    $id =  $_SESSION['user_id'];

    if($number<0) {
        header("Location: ./view-addmoney.php?err=1&id=".$id); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;  
    }else {
        dbAddmoney($db, $number, $id); 
    }

    

    header("Location: ./solde.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}

function view_modif() {
    $db = dbConnect();
    $id =  $_SESSION['user_id'];
    $res = dbGetModif($db,$id);

    return $res;
}

function isConnected()
{
    if (isset($_SESSION['user_id'])) return true;
    else return false;
}

function disconnect() {
    session_destroy();

    header("Location: ./index.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}

function register($db)
{

    $name = $_POST['nom'];
    $username = $_POST['prenom'];
    $passwd0 = $_POST['passwd'];
    $passwd1 = $_POST['passwd1'];

    if($passwd0 == $passwd1) {
        $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        $login = $_POST['prenom'][0]."".$_POST['nom'];

        dbCreateUser($db, $login, $passwd, $username, $name);

        header("Location: ./solde.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }else {
        header("Location: ./inscription.php?err=1"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }




}

function login($db) {
    $res = dbGetInfo($db, $_POST["login"]);
    $verify = password_verify($_POST["passwd"], $res['password']);

    if ($verify == true) {

        $_SESSION['user_id'] = dbGetInfo($db, $_POST["login"])['login'];

        header("Location: ./solde.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    } else {
        header("Location: ./index.php?err=badpasswd"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }
}

if (isset($_GET['func'])) {

    $_GET['func']($db);
}

?>