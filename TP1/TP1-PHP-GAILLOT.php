<html>
<head>
</head>
<body>
<h1>TP1</h1>
<hr>
<h2>Exercice 1</h2>
<h3>Question 1</h3>
<?php
echo "1 - le livre \"ma vie\" est terrible !! <br>";
echo "2 - le livre \"ma vie\" est terrible !! <br>";
echo "3 - le livre \"ma vie\" est terrible !! <br>";
echo "4 - le livre \"ma vie\" est terrible !! et le public
l'apprécie<br><br>";
$mavie = "ma vie";
echo "5 - le livre $mavie est terrible !! <br>";
echo "6 - le livre $mavie est terrible !! <br>";
?>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>
<?php echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. Citation de Coluche" ?>
<h3>Question 2</h3>
<?php echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. <i>Citation de Coluche</i>" ?>
<h3>Question 3</h3>
<?php echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. <b>Citation de Coluche</b>" ?>
<h3>Question 4</h3>
<?php
$var = strtoupper("Citation de Coluche");
echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. $var" ?>
<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>
<?php
$citation = "Citation de Coluche";
$auteur = "J'ai l'esprit large et je n'admets pas qu'on dise le contraire.";
echo "$auteur.$citation";
?>
<h3>Question 2</h3>
<?php
$citation = "Citation de Coluche";
$auteur = "J'ai l'esprit large et je n'admets pas qu'on dise le contraire.";
$v1 = isset($citation);
$v2 = isset($auteur);
echo (boolean)$v1." and ".(boolean)$v2;
?>
<h3>Question 3</h3>
<?php
const AUTEUR = "Citation de Coluche";
$citation = "J'ai l'esprit large et je n'admets pas qu'on dise le contraire.";
echo  "$citation".AUTEUR;
?>
<h3>Question 4</h3>
<?php
$auteur = "Citation de Coluche<br>";
$citation = "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
echo  "$citation".AUTEUR;
unset($citation);
unset($auteur);
$v1 = isset($auteur);
$v2 = isset($citation);
echo (int)$v1;
echo " and ";
echo (int)$v2;
?>
<h2>Exercice 4</h2>
<h3>Question 1</h3>
<?php
var_dump($_SERVER);
var_dump($GLOBALS);
?>
<h2>Exercice 5</h2>
<h3>Question 1</h3>
<?php 
ini_set("display_errors" , "off");
echo 'display_errors = ' . ini_get('display_errors') . "<br>";
ini_set("display_errors" , "on");
echo 'display_errors = ' . ini_get('display_errors') . "<br>";
?>
</body>
</html>