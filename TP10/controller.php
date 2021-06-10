<html>

<?php
require_once('./database.php');
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$db = dbConnect();
function view_admin()
{
    $db = dbConnect();
    $tab = dbGetAllStudents($db, $_SESSION['user_id']);

    return $tab;
}


function disconnect($db)
{
    session_destroy();

    header("Location: ./index.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}


function delete($db)
{


    $user_id = $_SESSION['user_id'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];

    dbDeleteStudent($db, $user_id, $nom, $prenom);

    header("Location: ./viewadmin.php"); /* Redirection du navigateur */
    exit;
}



function register($db)
{

    $name = $_POST['nom'];
    $username = $_POST['prenom'];
    $mail = $_POST['mail'];
    $login = $_POST['login'];
    $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);


    dbCreateUser($db, $login, $passwd, $mail, $username, $name);

    header("Location: ./index.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}

function login($db)
{
    $res = dbGetInfo($db, $_POST["login"]);
    $verify = password_verify($_POST["passwd"], $res['password']);

    if ($verify == true) {

        $_SESSION['user_id'] = dbGetInfo($db, $_POST["login"])['id'];

        header("Location: ./viewadmin.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    } else {
        header("Location: ./index.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }
}

function createetu($db)
{

    $user_id = $_SESSION['user_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $note = $_POST['note'];

    dbCreateStudent($db, $user_id, $nom, $prenom, $note);

    header("Location: ./viewadmin.php"); /* Redirection du navigateur */
    exit;
}

function isConnected()
{
    if (isset($_SESSION['user_id'])) return true;
    else return false;
}

function modifyetu($db)
{

    $user_id = $_SESSION['user_id'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $note = $_POST['note'];

    dbModifyStudent($db, $user_id, $nom, $prenom, $note);

    header("Location: ./viewadmin.php"); /* Redirection du navigateur */
    exit;
}

if (isset($_GET['func'])) {

    $_GET['func']($db);
}


?>

</html>