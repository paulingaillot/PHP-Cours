<?php
include("database.php");
ini_set('display_errors',1);
error_reporting(E_ALL);
$db = dbConnect();

$auteur = dbGetAuthorsNames($db);
$quote = dbGetQuotes($db);
$centurie = dbGetCenturies($db);

?>

<h1> Auteur de la BD</h1>

<?php
foreach($auteur as $v) {
    echo $v["nom"]." ".$v["prenom"]."<br>";
}
?>

<h1> citations de la BD</h1>

<?php
foreach($quote as $q) {
    echo $q["phrase"]."<br>";
}
?>

<h1> siecle de la BD</h1>

<?php
foreach($centurie as $c) {
    echo $c["numero"]."<br>";
}
?>