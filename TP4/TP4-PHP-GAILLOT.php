<html>

<header>
<link rel="stylesheet" href="style.css">
</header>

<body>

<h1> TP 4</h1>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>
<?php
echo "EN : ".date('l j F Y', mktime());
echo "<br>";
setlocale(LC_ALL, 'fr_FR.utf8');
echo "FR :".strftime("%A %e %B %Y", mktime());
echo "<br>";
echo "Date et heure : ".date('d/m H:i', mktime());
echo "Il s'est passé ".mktime()."s depuis les premières apparitions de UNIX";
?>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>
<?php

$birth = mktime(0,0,0,4,1,2001);
$now = mktime();
$res = $now - $birth;
echo "Date de naissance : ".date('l j F Y', mktime(0,0,0,4,1,2001));
echo "<br>";
echo "Date du jour :".date('l j F Y', mktime());
echo "<br>";

$year = date('Y', $res)-1970;

echo "Age :".$year."ans ".date("m", $res)." mois ".date("d", $res)." jours = ".($res/60/60/24)."d = ".($res)."sec";
?>
<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>
<?php 

$start =  mktime(15,51,29,10,31,2020);
$cicle = mktime(13,44,3,1,30,1970);

echo "Prochaine pleine lune : ".date('l j F Y H:i:s', $start+$cicle);
echo "<br>";
echo "Date de la 100e prochaine pleine lune (fin du monde) : ".date('l j F Y H:i:s', $start+$cicle*100);


?>
<hr>
<h2>Exercice 4</h2>
<h3>Question 1</h3>
<?php
echo (int)(checkdate(2,29,1962));
?>
<hr>
<h2>Exercice 5</h2>
<h3>Question 1</h3>
<?php
setlocale(LC_ALL, 'fr_FR.utf8');
echo "Day 3 mars 1993 : ".strftime("%A", mktime(0,0,0,3,3,1993));
?>
<hr>
<h2>Exercice 6</h2>
<h3>Question 1</h3>
<?php

for($i=2020; $i<2063; $i++){

if(checkdate(2,29,$i)==1) {
    echo $i;
    echo "<br>";
} 

}

?>
<hr>
<h2>Exercice 7</h2>
<h3>Question 1</h3>
<?php
$res = "BRUH";
for($i=2021; $i<2032; $i++){
    $res = strftime("%A", mktime(0,0,0,3,3,$i));
    echo "Day 1 mai ".$i." : ".strftime("%A", mktime(0,0,0,3,3,$i));  
    if($res == "dimanche" || $res == "samedi") echo " | Week end non prolongé";
    else if($res == "lundi" || $res == "vendredi") echo " | Week end prolongé";
    else echo " | Jour férié ";
    echo "<br>";
}
?>
</body>
</html>