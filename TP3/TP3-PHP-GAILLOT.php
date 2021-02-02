<html>
<header>
<link rel="stylesheet" href="style.css">
</header>
<body>

<h1> TP 3</h1>
<hr>
<h2>Exercice 1</h2>
<h3>Question 1</h3>
<?php
    $var =0;
    function increment() {
        global $var;
        $var++;
    }

    for( $i=0; $i<5; $i++) {
        increment();
        echo $var." ";
    }

?>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>
<?php

    function increment2($res) {
        $res++;
        return $res;
    }

    $res2 = 0;
    while($res2 < 10) {
        $res2 = increment2($res2);
        echo $res2." ";
    }

    
?>
<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>
<?php 

$identite = ['alain', 'basile', 'David', 'Edgar'];
$age = [1, 15, 35, 65];
$mail = ['penom.nom@gtail.be', 'truc@bruce.zo', 'caro@caramel.org', 'trop@monmel.fr'];


?>
<h3>Question 2</h3>
<?php

function mail1($mail) {

    $domain = strstr($mail, '@');
    $post = strstr($domain, '.');
    $domain = substr($domain, 1, strpos ($domain, '.')-1);
    $post = substr($post, 1);

    $res = $arrayName = array("" ,"" );

    $res[0] =  $domain;
    $res[1] = $post;
    return $res;
}

mail1($mail[0]);

?>

<h3>Question 3</h3>

<?php

function test($identite, $age, $mail) {
    $alea1 = rand(0,sizeof($identite)-1);
    $alea2 = rand(0,sizeof($age)-1);
    $alea3 = rand(0,sizeof($mail)-1);

    $val = mail1($mail[$alea3]);

    if($age[$alea2] == 1) $mess = $age[$alea2]." an";
    else $mess = $age[$alea2]." ans";

    echo "je me nomme ".ucfirst($identite[$alea1])." j'ai ".$mess." et mon mail est ".$mail[$alea3]." du domaine ".$val[0]." avec l'extension ".$val[1];
}

test($identite, $age, $mail);
?>

<hr>
<h2>Exercice 4</h2>
<h3>Question 1</h3>

<?php

function ligne() {

for($i=0;$i<5; $i++) {
    echo "*";
}

}
echo "1- Ligne() : <br> <br>";
ligne();
echo "<br>";

function carre_plein() {

    for($i=0;$i<5; $i++) {
        for($j=0;$j<5; $j++){
        echo "*";
        }
        echo "<br>";
    }
    
    }
echo " <br>2- Carre_plein() : <br> <br>";
carre_plein();
echo "<br>";

function triangle_iso() {

    for($i=0;$i<5; $i++) {
        for($j=0;$j<($i+1); $j++){
        echo "*";
        }
        echo "<br>";
    }
    
    }
echo " <br>3- triangle_iso() : <br> <br>";
triangle_iso();
echo "<br>";

function carré_vide() {

    for($i=0;$i<5; $i++) {
        for($j=0;$j<5; $j++){
        if($i==0 || $i==4 || ($j==0 || $j==4))echo "*";
        else echo "&nbsp; ";
        }
        echo "<br>";
    }
    
    }
echo " <br>4- carré_vide() : <br> <br>";
carré_vide();
echo "<br>";

function triangle_vide() {

    for($i=0;$i<5; $i++) {
        for($j=0;$j<($i+1); $j++){
            if($i==0 || $i==4 || ($j==0 || $j==$i))echo "*";
            else echo "&nbsp; ";
        }
        echo "<br>";
    }
    
    }
echo " <br>5- triangle_vide() : <br> <br>";
triangle_vide();
echo "<br>";

function triangle_vide_inv() {

    for($i=0;$i<5; $i++) {
        for($j=$i;$j<5; $j++){
            if($i==0 || $i==4 || ($j==$i || $j==4))echo "*";
            else echo "&nbsp; ";
        }
        echo "<br>";
    }
    
    }
echo " <br>5- triangle_vide_inv() : <br> <br>";
triangle_vide_inv();
echo "<br>";

?>

<hr>
<h2>Exercice 5</h2>
<h3>Question 1</h3>

<?php

function chiffrement($mess, $clé) {
    $tab = "abcdefghijklmnopqrstuvwxyz";
    $mess = strtolower($mess);
    for($i=0;$i<strlen($mess); $i++) {
        if($mess[$i] != " ") {
        for($j=0;$j<26; $j++) {
            if($mess[$i] == $tab[$j]) break;
        }
        $mess[$i] = $tab[($j+$clé)%26];
    }
}
    return $mess;
}
$mess1 = "Salut";
$mess1 = chiffrement($mess1, 3);
echo $mess1;

?>
<h3>Question 2</h3>

<?php

function dechiffrement($mess, $clé) {
    $tab = "abcdefghijklmnopqrstuvwxyz";
    $mess = strtolower($mess);
    for($i=0;$i<strlen($mess); $i++) {
        if($mess[$i] != " ") {
        for($j=0;$j<26; $j++) {
            if($mess[$i] == $tab[$j]) break;
        }
        $mess[$i] = $tab[($j-$clé)%26];
    }
    }
    return $mess;
}
$mess1 = "Salut";
$mess1 = dechiffrement($mess1, 3);
echo $mess1;

?>

<h3>Question 3</h3>

<?php


$mess1 = "Attaquez Asterix";
$mess1 = chiffrement($mess1, 3);
echo $mess1;
echo "<br>";
$mess1 = "DWWDTXHC DVWHULA";
$mess1 = dechiffrement($mess1, 3);
echo $mess1;

?>

<hr>
<h2>Exercice 6</h2>
<h3>Question 1</h3>

<?php

function chiffrementV($mess, $clé) {
    $tab = "abcdefghijklmnopqrstuvwxyz";
    $mess = strtolower($mess);
    $o=0;
    for($i=0;$i<strlen($mess); $i++) {
        if($mess[$i] != " ") {
        for($j=0;$j<26; $j++) {
            if($mess[$i] == $tab[$j]) break;
        }
        for($k=0;$k<26; $k++) {
            if($tab[$k] == $clé[(($i-$o)%strlen($clé))]) break;
        }
        $mess[$i] = $tab[($j+$k)%26];
    }else $o++;
}
    return $mess;
}
$mess1 = "Salut";
$mess1 = chiffrementV($mess1, "bonjour");
echo $mess1;

?>
<h3>Question 2</h3>
<?php 
function dechiffrementV($mess, $clé) {
    $tab = "abcdefghijklmnopqrstuvwxyz";
    $mess = strtolower($mess);
    $o=0;
    for($i=0;$i<strlen($mess); $i++) {
        if($mess[$i] != " ") {
        for($j=0;$j<26; $j++) {
            if($mess[$i] == $tab[$j]) break;
        }
        for($k=0;$k<26; $k++) {
            if($tab[$k] == $clé[(($i-$o)%strlen($clé))]) break;
        }
        $mess[$i] = $tab[($j-$k)%26];
    }else $o++;
}
    return $mess;
}
echo "<br>";
$mess1 = "toydh";
$mess1 = dechiffrementV($mess1, "bonjour");
echo $mess1;

?>
<h3>Question 3</h3>
<?php

echo "<br>";
$mess1 = "Attaquez Asterix";
$mess1 = chiffrementV($mess1, "dbe");
echo $mess1;

echo "<br>";
$mess1 = "duxdryha evuiujb";
$mess1 = dechiffrementV($mess1, "dbe");
echo $mess1;


?>

<hr>
<h2>Exercice 7</h2>
<h3>Question 1</h3>

<?php 

$annuaire=array(
    "PUJOL Olivier"=>"03 89 72 84 48",
    "IMBERT Jo"=>"03 89 36 06 05",
    "SPIEGEL Pierre"=>"03 87 67 92 37",
    "THOUVENOT Frédéric"=>"01 42 86 02 12",
    "MEGEL Pierre"=>"09 59 71 46 96",
    "SUCHET Loïc"=>"03 89 33 10 54",
    "GIROIS Francis"=>"03 88 01 21 15",
    "HOFFMANN Emmanuel"=>"03 89 69 20 05",
    "KELLER Fabien"=>"04 18 52 34 25",
    "LEY Jean-Marie"=>"03 89 43 17 85",
    "ZOELLE Thomas"=>"04 18 65 67 69",
    "WILHELM Olivier"=>"03 89 60 48 78",
    "BLIN Nathalie"=>"01 28 59 23 25",
    "BICARD Pierre-Eric"=>"03 89 69 25 82",
    "ZIEGLER Thierry"=>"03 89 06 33 89",
    "BADER Jean"=>"03 89 25 65 72",
    "ROSSO Anne-Sophie"=>"01 56 20 02 36",
    "ROTTNER Thierry"=>"03 88 29 61 54",
    "WEBER Joao"=>"03 89 35 45 20",
    "SCHILLINGER Olivier"=>"03 84 21 38 40",
    "BICARD Muriel"=>"03 89 33 47 99 ",
    "KELLER Christian"=>"03 88 19 16 10 ",
    "GROELLY Antonio"=>"03 89 33 60 63",
    "ALLARD Aline"=>"03 89 56 49 19",
    "WINNINGER Bénédicte"=>"04 16 14 86 66");

    ksort($annuaire);
    echo "<table class=\"table2\">";
    foreach($annuaire as $key => $value) {
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "</tr>";

    }
    echo "</table>";

?>

<hr>
<h2>Exercice 8</h2>
<h3>Question 1</h3>

<?php

    function isOn($A1, $A2, $A3, $A4, $A5, $A6) {
        if($A1 && $A3) return true;
        else if($A1 && $A4 && $A5) return true;
        else if($A2 && $A6) return true;
        else return false;
    }

    $A1 = true;
    $A2 = true;
    $A3 = true;
    $A4 = true;
    $A5 = true;
    $A6 = true;

    echo isOn($A1, $A2, $A3, $A4, $A5, $A6);

?>

<hr>
<h2>Exercice 9</h2>
<h3>Question 1</h3>

<?php 

$clients = ["1"=>"Dulong","ville 1"=>"Paris","age 1"=>"35",
	       "2"=>"Leparc","ville 2"=>"Lyon","age 2"=>"47",
           "3"=>"Dubos","ville 3"=>"Tours","age 3"=>"58"];

$clients["7"] = "Duval";
$clients["ville 7"] = "Nantes";
$clients["age 7"] = "25";

function printtab($tab) {

    echo "<table><tr><th>Client</th><th>Nom</th><th>Ville</th><th>Age</th></tr><tr>";
    foreach($tab as $key => $val) {
        if(!(strpos($key, "age") !== false || strpos($key, "ville") !== false)) {
            echo "</tr><tr>";
            echo "<th>Client ".$key."</th>";
        }
        echo "<td>".$val."</td>";
    }
    echo "</tr></table>";
}


printtab($clients);
           
?>

<hr>
<h2>Exercice 10</h2>
<h3>Question 1</h3>

<?php


function palindrome($var) {

    $test = true;
    for($i=0; $i<strlen($var)/2; $i++) {
        if($var[$i] != $var[strlen($var)-$i-1]) $test = false;
    }
    return $test;
}

echo "result = ".(int)(palindrome("madam"));
echo "<br>";
echo "result = ".(int)(palindrome("test"));

?>

<hr>
<h2>Exercice 11</h2>
<h3>Question 1</h3>

<?php

function validate($value) {

    for($i=sizeof($value)-2; $i>0; $i= $i-2) {
        $value[$i] *= 2;
    }

    $res =0;
    for($i=0; $i<sizeof($value); $i++) {
        if($value[$i]>=10) $value[$i] -= 9;
        $res += $value[$i];
    }

    if($res%10 == 0) return true;
    else return false;
}

    echo "Result = ".(int)validate([rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9)]);
    echo "<br>";

?>

</body>


</html>