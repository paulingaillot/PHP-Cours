<html>
<header>
<link rel="stylesheet" href="style.css">
</header>
<body>
<h1> TP 2</h1>
<hr>
<h2>Exercice 1</h2>
<h3>Question 1</h3>
<?php
    $age = rand(0,99);

    if($age <= 12) echo $age." --> Enfant";
    else if($age <= 19) echo $age." --> Ado";
    else if($age <=50) echo $age." --> Adulte";
    else if($age <= 70) echo $age." --> Senior";
    else echo $age." --> personne agée";

?>
<h3>Question 2</h3>
<?php
    $age = rand(0,99);

    switch (true) {
        case $age<=12:
            echo $age." --> Enfant";
            break;
        case $age<=19:
            echo $age." --> Ado";
            break;
        case $age<=50:
            echo $age." --> Adulte";
            break;
        case $age<=70:
            echo $age." --> Senior";
            break;
        default :
        echo $age." --> Personne agée";
        break;
    }

?>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>
<?php

$tab = array('F0' => 0, 'F1' => 1, 'F2' => 1);
$i = 2;
while($i <20) {
    $i++;
    $tab['F'.$i] = $tab['F'.($i-1)] + $tab['F'.($i-2)];
}
echo "<table>";
echo "<tr>";
foreach ($tab as $key => $value) {
    echo "<td>".$key."</td>";
}
echo "</tr>";
foreach ($tab as $value) {
    echo "<td>".$value."</td>";
}
echo "</tr></table>";
?>
<h3>Question 2</h3>
<?php

$tab = array('F0' => 0, 'F1' => 1, 'F2' => 1);
$i = 0;

do {
        $i++;
        if($i>=2)$tab['F'.$i] = $tab['F'.($i-1)] + $tab['F'.($i-2)];
        if($i>=2)echo "F".$i."/F".($i-1)." : ".$tab["F".$i]/$tab["F".($i-1)];
        if($i>=2)echo "<br>";
}
while($i <30) ;

?>
<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>
<?php

$res = 0;
for($i=1; $i<15; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;
echo "<br>";
$res = 0;
for($i=1; $i<150; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;
echo "<br>";
$res = 0;
for($i=1; $i<1500; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;
echo "<br>";
$res = 0;
for($i=1; $i<15000; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;

?>
<hr>
<h2>Exercice 4</h2>
<h3>Question 1</h3>
<?php

$tab = array("Vernerie" => "Qu'est ce que je peux vous donner en exemple sans tout péter", "Freixas" => "J'ai plus de cerveau", "Valentin" => "Quoi, Quoi, Quoi ?", "Noémie" => "Ouiiiiiiiiiii !!!!!", "Pierre" => "Nan");

foreach ($tab as $key => $value) {
    echo $key." => ".$value."<br>";
}

?>
<hr>
<h2>Exercice 5</h2>
<h3>Question 1</h3>
<?php 

    $nb = rand(0,200000000);
    echo "<table id='exo5'><tr><td colspan=2>Table de multiplication de ".$nb."</td></tr>";


    for($i=0; $i<=10; $i++) {
        echo "<tr>";
        echo "<td> ".$i."*".$nb."</td>";
        echo "<td> ".$i*$nb."</td>";
        echo "</tr>";
    }

    echo "</table>";

?>
<hr>
<h2>Exercice 6</h2>
<h3>Question 1</h3>
<?php 

    for($i=1;$i<=98; $i++){
        $prem = true;
        $res = sqrt($i);
        for($j=2;$j<=$res; $j++){
            $res1 = ($i/$j);
            if($i%$j==0)$prem = false;
        }
        if($prem == true) echo $i." ";

    }

?>
<hr>
<h2>Exercice 7</h2>
<h3>Question 1</h3>
<?php 
    $nb = rand(0,999);
    $nb2 = rand(0,5);

    if($nb2 == 0) $entry = $nb."";
    if($nb2 == 1) $entry = $nb."K";
    if($nb2 == 2) $entry = $nb."M";
    if($nb2 == 3) $entry = $nb."G";
    if($nb2 == 4) $entry = $nb."T";
    if($nb2 == 5) $entry = $nb."P";

    if($entry[strlen($entry)-1] == "K" || $entry[strlen($entry)-1] == "M" || $entry[strlen($entry)-1] == "G" ||
    $entry[strlen($entry)-1] == "T" || $entry[strlen($entry)-1] == "P") {
        $entry2 = substr($entry, 0, strlen($entry)-1);
        $value = $entry[strlen($entry)-1];
    } else {
        $entry2 = $entry;
        $value = "";
    } 

    $res = $entry." = ".$entry2;
    switch ($value) {
        case "P":
            $res =  $res." x 1024";
        case "T":
            $res =  $res." x 1024";
        case "G":
            $res =  $res." x  1024";
        case "M":
            $res =  $res." x  1024";
        case "K":
            $res =  $res." x  1024";
        default :
        break;

    }
    echo $res;

?>
</body>
</html>